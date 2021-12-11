<?php

//function to get the title of the page dynamically for any page in the site
function getTitle() {
  global $pageTitle;
  if(isset($pageTitle)) {
    echo $pageTitle;
  }else {
    echo "Default";
  }
}


?>