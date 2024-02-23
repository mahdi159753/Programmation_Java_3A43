<?php

namespace App\Twig;

use GuzzleHttp\Client;

class MyMemoryTranslator
{
    private $apiKey;
    private $client;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => 'https://api.mymemory.translated.net',
            'timeout' => 20.0, // set the timeout to 10 seconds
        ]);
        
    }

    public function translate(string $text, string $sourceLang, string $targetLang): string
    {
        $strippedtext=strip_tags($text);

        $response = $this->client->get('/get', [
            'query' => [
                'q' => $strippedtext,
                'langpair' => "{$sourceLang}|{$targetLang}",
                'key' => $this->apiKey,
            ],
        ]);

        $json = $response->getBody()->getContents();
        $data = json_decode($json, true);

        return $data['responseData']['translatedText'];
    }
}
    
