<?php

namespace Coderello\DynamicRendering\Renderers;

use Coderello\DynamicRendering\Support\RenderingResult;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RendertronRenderer implements Renderer
{
    /**
     * @var string|null
     */
    protected $rendertronUrl;

    public function __construct(array $options = [])
    {
        $this->rendertronUrl = $options['url'] ?? null;
    }

    public function render(string $url): RenderingResult
    {
		//fixed Rendering to HTTPS
        $url = str_replace("http://", "https://", $url);
        $client = new Client;

        $response = $client->get(Str::finish($this->rendertronUrl, '/render/').$url, [
            RequestOptions::HTTP_ERRORS => false,
        ]);

        return (new RenderingResult)
            ->setContent($response->getBody()->getContents())
            ->setStatusCode($response->getStatusCode());
    }

    public function isRendering(Request $request): bool
    {
        return Str::contains($request->userAgent(), 'HeadlessChrome');
    }
}
