<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Http\Request;

class StalkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $client = new Client(['base_uri' => 'https://www.cliquefarma.com.br/preco/']);
        $product = '7891142145413';
        $resposta = $client->request('GET', $product);

        $html = $resposta->getBody();

        $crawler = new Crawler();
        $crawler->addHtmlContent($html);

        $prices = $crawler->filter('p.title-1.color-10.preco-oferta2.inline');
        $stores = $crawler->filter('figcaption.no-margin-bt.xs-size');

        $priceStore[] = [];

        return view('prices.index', compact('prices', 'product'));
    }
}
