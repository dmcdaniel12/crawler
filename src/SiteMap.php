<?php

/**
 * This will parse XML sitemap
 */
class SiteMap {

    protected $siteMapFile;
    protected $siteMapData;
    protected $siteUrls;

    public function getSiteMapFile() {
        return $this->siteMapFile;
    }

    public function setSiteMapFile($siteMapFile) {
        $this->siteMapFile = $siteMapFile;
    }
    
    public function setSiteMapData($siteMapData) {
        $this->siteMapData = $siteMapData;
    }

    public function getSiteMapData(){
        return $this->siteMapData;
    }
    
    public function getSiteUrls() {
        return $this->siteUrls;
    }

    public function setSiteUrls($siteUrls) {
        $this->siteUrls = $siteUrls;
    }

    public function __construct($fileName) {
        $this->setSiteMapFile($fileName);
    }
    
    public function getSiteMap(){
        $this->setSiteMapData(simplexml_load_string($this->readFile($this->getSiteMapFile())));
        
    }
    
    public function readFile(){
        return file_get_contents($this->getSiteMapFile());
    }
    
    public function parseSiteMapData(){
        $siteMap = array();
        $count = 0;
        foreach($this->getSiteMapData() as $d){
            $siteMap[$count] = (string) $d->loc;
            $count++;
        }
        return $siteMap;
    }

}
