<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        // Home Page
        $sitemap .= $this->addUrl(route('home'), now(), 'daily', '1.0');
        
        // About Page
        $sitemap .= $this->addUrl(route('about'), now(), 'monthly', '0.8');
        
        // Services Page
        $sitemap .= $this->addUrl(route('services'), now(), 'weekly', '0.9');
        
        // Gallery Page
        $sitemap .= $this->addUrl(route('gallery'), now(), 'weekly', '0.8');
        
        // Contact Page
        $sitemap .= $this->addUrl(route('contact'), now(), 'monthly', '0.7');
        
        // Terms & Conditions Page
        $sitemap .= $this->addUrl(route('terms-conditions'), now(), 'monthly', '0.5');
        
        // Dynamic Project Pages
        $projects = Project::all();
        foreach ($projects as $project) {
            $sitemap .= $this->addUrl(
                route('project.details', $project->id),
                $project->updated_at,
                'monthly',
                '0.7'
            );
        }
        
        $sitemap .= '</urlset>';
        
        return response($sitemap, 200)
            ->header('Content-Type', 'text/xml');
    }
    
    private function addUrl($loc, $lastmod, $changefreq, $priority)
    {
        $url = '<url>';
        $url .= '<loc>' . htmlspecialchars($loc) . '</loc>';
        $url .= '<lastmod>' . date('Y-m-d', strtotime($lastmod)) . '</lastmod>';
        $url .= '<changefreq>' . $changefreq . '</changefreq>';
        $url .= '<priority>' . $priority . '</priority>';
        $url .= '</url>';
        
        return $url;
    }
}
