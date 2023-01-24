<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteMapController extends Controller
{
    private $siteMap;

    public function index(){

        $siteMapXml = Cache::remember('sitemap', 3, function () {
            $this->siteMap = new SiteMap();

            $this->addUniqueRoutes();
            $this->addArticles();
            $this->addCategories();
            $this->addDynamicPages();
            //$this->addTags();
            //$this->addProjects();
            //$this->addProfilePages();

            return $this->siteMap->build();
        });

        return response($siteMapXml, 200)
            ->header('Content-Type', 'text/xml');


    }

    private function addUniqueRoutes()
    {
        //$startOfMonth = Carbon::now()->startOfMonth()->format('c');
        $startOfMonth = '2022-12-03';
        $this->siteMap->add(
            Url::create('/')
                ->lastUpdate($startOfMonth)
                ->frequency('monthly')
                ->priority('1.00')
        );

/*         $this->siteMap->add(
            Url::create('/contacto')
                ->lastUpdate($startOfMonth)
                ->frequency('yearly')
                ->priority('0.8')
        ); */


    }

    private function addArticles()
    {
        $posts = Post::where([
            ['type','<>','nav_menu_item'],
            ['status','<>','5'],
        ])->orderBy('id', 'desc')
        ->get();

        foreach ($posts as $post) {
            $this->siteMap->add(
                Url::create("/post/$post->slug")
                    ->lastUpdate($post->updated_at->format('Y-m-d'))
                    ->frequency('monthly')
                    ->priority('0.9')
            );
        }
    }

    private function addCategories()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $this->siteMap->add(
                Url::create("/category/$category->slug")
                    ->lastUpdate($category->updated_at->format('Y-m-d'))
                    ->frequency('monthly')
                    ->priority('0.8')
            );
        }
    }

    private function addDynamicPages()
    {
        $pages = Post::where('type', 'page')->get();

        foreach ($pages as $page) {
            $this->siteMap->add(
                Url::create("/page/$page->slug")
                    ->lastUpdate($page->updated_at->format('Y-m-d'))
                    ->frequency('monthly')
                    ->priority('0.8')
            );
        }
    }
}





class SiteMap
{
    const START_TAG = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    const END_TAG = '</urlset>';

    // to build the XML content
    private $content;

    public function add(Url $siteMapUrl)
    {
        $this->content .= $siteMapUrl->build();
    }

    public function build()
    {
        return self::START_TAG . $this->content . self::END_TAG;
    }
}

class Url
{
    private $url;
    private $lastUpdate;
    private $frequency;
    private $priority;

    public static function create($url)
    {
        $newNode = new self();
        $newNode->url = url($url);
        return $newNode;
    }

    public function lastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

    public function frequency($frequency)
    {
        $this->frequency = $frequency;
        return $this;
    }

    public function priority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    public function build()
    {
        // $url = 'https://programacionymas.com/';
        // $lastUpdate = '2019-07-31T01:06:39+00:00';
        // $frequency = 'monthly';
        // $priority = '1.00';
        return "<url>" .
            "<loc>$this->url</loc>" .
            "<lastmod>$this->lastUpdate</lastmod>" .
            "<changefreq>$this->frequency</changefreq>" .
            "<priority>$this->priority</priority>" .
        "</url>";
    }
}

