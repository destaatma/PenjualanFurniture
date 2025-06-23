<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;


class FonnteService
{
    protected string $apiKey;


    protected string $baseUrl;


    public function __construct()
    {
        $this->apiKey = config('services.fonnte.api_key');
        if (empty($this->apiKey)) {
            Log::error('Fonnte API key (services.fonnte.api_key) tidak dikonfigurasi atau kosong.');
            throw new InvalidArgumentException('Fonnte API key (services.fonnte.api_key) tidak dikonfigurasi atau kosong.');
        }
        $configuredBaseUrl = config('services.fonnte.base_url', 'https://api.fonnte.com');
        $this->baseUrl = rtrim($configuredBaseUrl, '/');


        if (empty($this->baseUrl)) {
            Log::error('Fonnte Base URL (services.fonnte.base_url) dikonfigurasi sebagai string kosong atau menghasilkan URL kosong.');
            throw new InvalidArgumentException('Fonnte Base URL (services.fonnte.base_url) dikonfigurasi sebagai string kosong atau menghasilkan URL kosong.');
        }
    }


    public function sendAdvancedMessage(array $params): ?array
    {
        $fullUrl = "{$this->baseUrl}/send";


        $response = Http::withHeaders([
            'Authorization' => $this->apiKey
        ])->asForm()->post($fullUrl, $params);


        if ($response->successful()) {
            return $response->json();
        }


        Log::error("Fonnte API request failed to {$fullUrl}", [
            'status_code' => $response->status(),
            'response_body' => $response->body(),
            'params_sent' => $params
        ]);


        return [
            'status' => false,
            'message' => 'Request ke Fonnte API gagal.',
            'http_status_code' => $response->status(),
            'errors' => $response->json() ?? ['detail' => 'Tidak ada response JSON, lihat body.', 'raw_body' => $response->body()],
        ];
    }
}
