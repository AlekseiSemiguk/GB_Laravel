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

        $categoryId = $this->getIdOrCreateByFieldValue(
            Category::class,
            'title',
            get_class($this)::NEWS_CATEGORY
        );

        $newsSourceId = $this->getIdOrCreateByFieldValue(
            NewsSource::class,
            'title',
            get_class($this)::NEWS_SOURCE
        );

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

            $validated = $validator->validated();

            $validated['category_id'] = $categoryId;
            $validated['news_source_id'] = $newsSourceId;

            News::create($validated);
            $importCount++;
        }

        $totalNewsCount = count($this->data['news']);
        return "Импортировано новостей $importCount из $totalNewsCount";
    }

    protected function getIdOrCreateByFieldValue($modelClass, $column, $value): int
    {
        $row = $modelClass::query()->where($column, '=', $value)->first();
        if ($row === null) {
            $row = $modelClass::create([$column => $value]);
        }
        return $row->id;
    }
}
