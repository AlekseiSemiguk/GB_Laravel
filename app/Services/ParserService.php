<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Validator;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;
    private array $data;
    const NEWS_CATEGORY = "Новости от Yandex";
    const NEWS_SOURCE = "Yandex";
    private int $categoryId = 0;
    private int $newsSourceId = 0;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData(): self
    {
        $xml = XmlParser::load($this->link);

        $this->data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        return $this;
    }

    public function saveData(): string
    {
        $importCount = 0;
        foreach ($this->data['news'] as $newsItem) {
            $newsItem['date'] = $newsItem ['pubDate'];
            unset ($newsItem ['pubDate']);
            $validator = Validator::make($newsItem, [
                'title' => 'required',
                'link' => 'required',
                'description' => 'required',
                'date' => 'required|date',
            ]);

            if ($validator->fails()) {
                continue;
            }

            $categoryId = $this->getCategoryId();
            $newsSourceId = $this->getNewsSourceId();

            $validated = $validator->validated();

            $validated['category_id'] = $categoryId;
            $validated['news_source_id'] = $newsSourceId;

            News::create($validated);
            $importCount++;
        }

        $totalNewsCount = count($this->data['news']);
        return "Импортировано новостей $importCount из $totalNewsCount";
    }

    public function getCategoryId()
    {
        if ($this->categoryId === 0) {
            $category = Category::query()->where('title', '=', get_class($this)::NEWS_CATEGORY)->first();
            if ($category === null) {
                $category = Category::create(['title' => get_class($this)::NEWS_CATEGORY]);
            }
            return $this->categoryId = $category->id;
        } else {
            return $this->categoryId;
        }
    }

    public function getNewsSourceId()
    {
        if ($this->newsSourceId === 0) {
            $newsSource = NewsSource::query()->where('title', '=', get_class($this)::NEWS_SOURCE)->first();
            if ($newsSource === null) {
                $newsSource = NewsSource::create(['title' => get_class($this)::NEWS_SOURCE]);
            }
            return $this->newsSourceId = $newsSource->id;
        } else {
            return $this->newsSourceId;
        }
    }
}
