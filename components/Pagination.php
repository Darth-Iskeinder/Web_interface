<?php

/*
 * Class for generating pagination
 */
class Pagination {
    /*
     * $var Page navigation links
     */
    private $max = 10;
    
    /*
     * $ var The key for the GET into which the page number is written
     */
    private $index = 'page';
    
    /*
     * $var Current page
     */
    private $current_page;
    
    /*
     * $var Total number of entries
     */
    private $total;
    
    /*
     * $var Entries for page
     */
    private $limit;
    
    /*
     * Starting the necessary entries for navigation
     
     */
    
    public function __construct($total, $currentPage, $limit, $index) 
    {
        //Set the total numbers of records
        $this->total = $total;
        
        //Set the number of records per page
        $this->limit = $limit;
        
        //Set the key in url
        $this->index = $index;
        
        //Set the number of pages
        $this->amount = $this->amount();
        
        //Set the current page number
        $this->setCurrentPage($currentPage);
    }
    
    /*
     * To display links
     * 
     * @return HTML-code with navigation links
     */
    public function get() 
    {
        //To record links
        $links = null;
        
        //We get restrictions for the cycle
        $limits = $this->limits();
        
        $html = '<ul class="pagination">';
        //Generate links
        for ($page = $limits[0]; $page <= $limits[1]; $page++) {
            //If the current is the current page, there is no link and the active class is added
            if ($page == $this->current_page) {
                $links.='<li class="active"><a href="#">'.$page.'</a></li>';
            } else {
                //Else generate links
                $links.=$this->generateHtml($page);
            }
        }
        
        //If links are created
        if (!is_null($links)) {
            //if the current page is not the first 
            if ($this->current_page > 1)
            //Create links "To the first"
                $links = $this->generateHtml(1, '$lt;').$links;
            
            //if the current page is not the first 
            if ($this->current_page < $this->amount)
            //Create link "To the last"
                $links.=$this->generateHtml($this->amount, '&gt;');
        }
        $html.=$links.'</ul>';
        
        //Return html
        return $html;
        
    }
    /*
     * For generating HTML-code links
     */
    private function generateHtml($page, $text = null) 
    {
        //if link text is not specified
        if (!$text)
        //indicate that the text is a page number
            $text = $page;
        
        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/').'/';
        $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);
        //Generate HTML link code and return
        return '<li><a href="'.$currentURI . $this->index.$page.'">'.$text.'</a></li>';
        
    }
    /*
     * To get where to start
     * @return array with start and end
     */
    private function limits() 
    {
        //calculate links (so that the active part is in the middle)
        $left = $this->current_page - round($this->max / 2);
        
        //calculate start
        $start = $left > 0 ? $left : 1;
        
        //If there is at least $ this-> max pages ahead
        if ($start + $this->max <= $this->amount){
           //Assign the end of the loop forward to $ this-> max pages or just to a minimum
            $end = $start > 1 ? $start + $this->max : $this->max; 
        }
        else {
            //End - Total Pages
            $end = $this->amount;
            
            //start - minus $ this-> max from the end
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        //return 
        return array($start, $end);
        
    }
    /*
     * For set current pages
     */
    private function setCurrentPage($currentPage)
    {
        //Get number of pages
        $this->current_page = $currentPage;
        
        //if current pages more than zero
        if ($this->current_page > 0) {
            //If the current page is less than the total number of pages
            if ($this->current_page > $this->amount)
            //Set the page to the last
                $this->current_page = $this->amount;
        } else {
            //Set the page to the first
            $this->current_page = 1;
            
        }
    }
    /*
     * To get the total number of pages
     */
    private function amount()
    {
        //divide and return
        return round($this->total / $this->limit);
    }
}
