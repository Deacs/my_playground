<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');
?>
<style type="text/css">
#updateSearch{
	cursor:pointer;
}
#loading{
	height:48px;
	width:48px;
	background:url('/img/ajax-loader.gif') 0 0 no-repeat;
	position:relative;
	top:100px;
	margin:0 auto;
	display:none;
}
#wrapper{
	display:none;
	margin-bottom:20px;
	padding-bottom:20px;
	border-bottom:1px solid #eee;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="/js/handlebars.js"></script>
<h1>Handlebars</h1>
<hr />
<h4><a href="http://net.tutsplus.com/tutorials/javascript-ajax/introduction-to-handlebars/" target="_blank">An Introduction to Handlebars</a></h4>
<h4><a href="http://handlebarsjs.com/" target="_blank">Handlebars JS</a></h4>
<h4><a href="https://developer.yummly.com/" target="_blank">Yummly Developer</a></h4>
<hr />
<div class="alert">
	<ul>
		<li>Application ID: 8c09d106</li>
		<li>Application Key: 52809e8447db75590b751ba82f73f7dc</li>
	</ul>
</div>

<hr />
<input type="text" name="q" id="q" value="Cake" /> <i class="icon-search" id="updateSearch"></i>
<hr />

<div id="recipeWrapper">
	<div id="loading"></div>
	<div id="wrapper"></div>
</div>

<script id="Handlebars-Template" type="text/x-handlebars-template">
   <div id="Content">
     <h1>&Xi;RecipeCards
      <span id='BOS'>Recipe search powered by
         <a id='Logo' href='http://www.yummly.com/recipes'>
            <img src='http://static.yummly.com/api-logo.png'/>
         </a>
      </span>
     </h1>
     {{#if Recipes}}
     {{#each Recipes}}
      <div class='Box'>
         <img class='Thumb' src="{{{Image}}}" alt="{{Name}}">
         <h3>{{Name}} <a id='Logo' href="{{Source.Url}}"> - {{Source.Name}}</a></h3>
         <h5>{{getFlavor Flavors}}</h5>
         <h5>{{Yield}}</h5>
         <p>Ingredients:</p>
         <ul>
            {{#each Ingredients}}
               <li>{{this}}</li>
            {{/each}}
         </ul>
      </div>
     {{/each}}
     {{else}}
     <div class="alert alert-error">
     	No recipes found. Please try again.
     </div>
     {{/if}}
   </div>
</script>

<script>
$(document).ready(function() {

	// Register a halper that evaluates the predominant flavour of each recipe
	Handlebars.registerHelper("getFlavor", function(FlavorsArr){
	   var 	H 		= 0,
	   		Name 	= '';
	   for(var F in FlavorsArr)
	   {
	      if(FlavorsArr[F] > H)
	      {
	         H = FlavorsArr[F];
	         Name = F;
	      }
	   }
	   return "This Dish has a " + Name + " Flavor";
	});
	
	var $queryString 			= $("#q"), 
		$updateSearch 			= $("#updateSearch"),
		$loading 				= $("#loading"),
		$wrapper 				= $("#wrapper"),
		$handlebars_template 	= $("#Handlebars-Template");

	$updateSearch.on('click', function() {

		$wrapper.hide();
		$loading.show();

		var q = $queryString.val();

		if (q != '') {

			$.ajax({
			  	url: 'recipe.php',
			  	dataType: 'json',
			  	data: {queryString: q},
			  	success: function(RecipeData) {
			  		
			  		var source   	= $handlebars_template.html(),
			  			template 	= Handlebars.compile(source),
						html    	= template({ Recipes : RecipeData });

					$loading.fadeOut(500);
					$wrapper.delay(500).html(html).fadeIn(1000);

			  	},
			  	error: function() {
			  		console.log('Error');
			  	}
			});
		}
	})
	
});

</script>
