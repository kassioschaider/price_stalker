<?php

namespace App\Http\Controllers;

use App\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class AnalyseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(int $productId)
    {
        $client = new Client(['base_uri' => 'https://www.cliquefarma.com.br/preco/']);
        $product = Product::find($productId);
        $resposta = $client->request('GET', $product->barCode);

        $html = $resposta->getBody();

        $crawler = new Crawler();
        $crawler->addHtmlContent($html);

        $prices = $crawler->filter('p.title-1.color-10.preco-oferta2.inline');
        return view('analyses.index', compact('prices', 'product'));
    }
}
