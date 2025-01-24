<?php

class OpenaiApi
{
    private $apiKey;
    private $apiUrl = 'https://api.openai.com/v1/completions';

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function createCompletion(string $prompt, array $options = [])
    {
        $defaultOptions = [
            'model' => 'text-davinci-003',
            'max_tokens' => 1500,
            'temperature' => 0.4,
            'top_p' => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ];

        $options = array_merge($defaultOptions, $options);

        $data = json_encode($options);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->apiKey,
        ]);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); // เปิดใช้งานการตรวจสอบ SSL Certificate

        $response = curl_exec($curl);
        $error = curl_error($ch);

        curl_close($ch);

        if ($error) {
            throw new Exception('Curl Error: ' . $error);
        }

        $result = json_decode($response, true);

        if (isset($result['error'])) {
            throw new Exception('OpenAI API Error: ' . $result['error']['message']);
        }

        return $result['choices'][0]['text'];
    }
}

/*
$apiKey = "YOUR_API_KEY";
$openai = new OpenaiApi($apiKey);

$prompt = "เขียนบทกวีเกี่ยวกับแมว";
$response = $openai->createCompletion($prompt, [
    'max_tokens' => 200,
    'temperature' => 0.7,
]);

echo $response;



*/