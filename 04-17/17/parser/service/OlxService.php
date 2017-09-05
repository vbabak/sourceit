<?php

class OlxService implements ParseInterface
{
    protected $url = 'https://www.olx.ua/elektronika/';

    public function parse()
    {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
        curl_close($ch);
        $data = $this->getParsedData($result);
        return $data;
    }

    protected function getParsedData($html_str)
    {
        $data = [];
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($html_str);
        $xpath = new DOMXPath($dom);
        $query = '//table//h3/parent::*/parent::*/parent::*/parent::*';
        $cards = $xpath->query($query);
        foreach ($cards as $card) {
            $title = $card->getElementsByTagName('h3')
                ->item(0)
                ->nodeValue;
            $imgList = $card->getElementsByTagName('img');
            if (!$imgList->length) {
                continue;
            }
            $img = $imgList->item(0)
                ->getAttribute('src');
            $price = $card->getElementsByTagName('p')
                ->item(1)
                ->nodeValue;
            $data[] = [
                'title' => trim($title),
                'img' => trim($img),
                'price' => trim($price)
            ];
        }
        return $data;
    }
}
