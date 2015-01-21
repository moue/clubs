var items = []; // Declare item array up here so our custom function can use it as well as doc-ready stuff
var $container = jQuery('#clubs_wrapper'); // cache the isotope container item because it is called multiple times


$(document).ready(function(){
  $('#all').attr('checked',true);

  var container = $('#clubs_wrapper'), checkboxes = $('#filters input');

  container.isotope({ 
    containerStyle: { //overflow:'scroll', 
    position: 'relative'},
    resizesContainer: false,
    itemSelector: '.box-small' });

  $('input').change(function(){
    var filters = [];
    if ($(this).attr('id')=='all')
       {
          filters.push('*');
          checkboxes.each(function(){
            if ($(this).attr('id')!='all'){$(this).attr('checked',false);}
          });
       }
   else
    {
      $('#all').attr('checked',false);
      checkboxes.each(function(){
          if ($(this).is(':checked'))
          {
            filters.push(this.value);
          }
         });
    }
    
    filters = filters.join(', ');
  container.isotope({ filter: filters});
  });


  });

jQuery('document').ready(function($){
        

        // stick items into array declared above as a series of objects
        // we could include more than just the name in here, to build up a bigger search 'index'
        $('span.name').each(function(){
                var tmp = {};
                tmp.id = $(this).parent().parent().attr('class');
                tmp.name = ($(this).text().toLowerCase());
                items.push( tmp );
        });
                
        // User types in search box - call our search function and supply lower-case keyword as argument
        $('#search-isotope').bind('keyup', function() {
                isotopeSearch( $(this).val().toLowerCase() );
        });
        
        // User clicks 'show all', make call to search function with an empty keyword var
        $('#showAll').click(function(){
                $('#search').val(''); // reset input el value
                isotopeSearch(false); // restores all items
                return false;   
        });
                
});  
  

// Additional JS functions here

/**
 * Function takes single keyword as argument,
 * checks array of item objects and looks for substring matches between item.name and keyword,
 * if matches are found calls isotope.filter() function on our collection.
 */
 
function isotopeSearch(kwd)
{
		log(kwd);
        // reset results arrays
        var matches = [];

        $('#noMatches').hide(); // ensure this is always hidden when we start a new query

        if ( (kwd != '') && (kwd.length >= 2) ) { // min 2 chars to execute query:
                
                
                // loop through items array  
                var itemslength = items.length
                for(var i = 0; i < itemslength; i++) {      
                        if ( items[i].name.indexOf(kwd) !== -1 ) { // keyword matches element
                                matches.push("." + items[i].id);
                        }
                };
            
            	var string = "";
                
                if (matches.length == 0) {
                		log("failure");
                        $('#noMatches').show(); // deal with empty results set
                } else {
                	matches = matches.join(', ');
                	$container.isotope({ filter: matches });	                	
                }

                

                
        } else {
                // show all if keyword less than 2 chars
                $container.isotope({ filter: '.box-small' });
        }

}

function log(msg) {
    setTimeout(function() {
        throw new Error(msg);
    }, 0);
}
