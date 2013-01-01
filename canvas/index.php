<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');

print '<h1>Canvas!</h1>';

?>
 
<style type="text/css">
canvas{
	border:1px dashed #ccc;
        margin-bottom:10px;
        cursor:crosshair;
}
div.lesson{
        display:none;
}
</style>

<h4><a href="http://net.tutsplus.com/sessions/canvas-from-scratch/" target="_blank">Canvas from scratch</a></h4>

<div class="btn-group" id="lessonBtns">
  <button class="btn" data-lesson="1">Lesson 1</button>
  <button class="btn" data-lesson="2">Lesson 2</button>
  <button class="btn" data-lesson="3">Lesson 3</button>
  <button class="btn" data-lesson="4a">Lesson 4a</button>
  <button class="btn" data-lesson="4b">Lesson 4b</button>
</div>

<div id="lesson_4b" class="lesson" style="display:block;">
        <ul class="nav nav-pills" id="channelSwitcher">
                <li class="active" data-state="standard">
                        <a href="#">Standard</a>
                </li>
                <li data-state="inverted">
                        <a href="#">Inverted</a>
                </li>
        </ul>

        <canvas width="640" height="427" id="manipulation_4c">
                <!-- Insert fallback content here -->
        </canvas>
        <div id="swatch" style="width:640px;height:30px;border:1px solid #777;"></div>
        <div id="colorVal"></div>
</div>
<div id="lesson_4a" class="lesson">
        <canvas width="700" height="900" id="manipulation_4a">
                <!-- Insert fallback content here -->
        </canvas>
</div>
<div id="lesson_3" class="lesson">
        <canvas width="700" height="700" id="gradient_three">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="700" id="gradient_two">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="700" id="gradient">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="150" id="shadows">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="300" id="rotating_two">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="300" id="rotating">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="400" id="scaling_two">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="400" id="scaling">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="200" id="translations">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="80" id="state_two">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="80" id="state_one">
                <!-- Insert fallback content here -->
        </canvas>
</div>
<div id="lesson_2" class="lesson">
        <canvas width="700" height="100" id="ad_two">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="120" id="ad_one">
                <!-- Insert fallback content here -->
        </canvas>
</div>
<div id="lesson_1" class="lesson">
        <canvas width="700" height="120" id="thirdCanvas">
                <!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="250" id="secondCanvas">
        	<!-- Insert fallback content here -->
        </canvas>
        <canvas width="700" height="120" id="firstCanvas">
                <!-- Insert fallback content here -->
        </canvas>
</div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php');
?>

<script>  
    $(document).ready(function() { 



        // Lesson three below --- Transformations and gradients
        // Gradients
        // Radial gradient
        // - The right way
        var canvas = document.getElementById('gradient_three');
        var ctx = canvas.getContext("2d");
        var canvasCentreX = canvas.width/2;
        var canvasCentreY = canvas.height/2;

        var gradient = ctx.createRadialGradient(canvasCentreX, canvasCentreY, 250, canvasCentreX, canvasCentreY, 0);
        gradient.addColorStop(0, "rgb(0, 0, 0)");
        gradient.addColorStop(1, "rgb(125, 125, 125)");

        //  The code above creates a radial gradient that sits at the centre of the canvas. 
        //  One of the circles in the gradient has a radius of 0, while the other has a radius of 250. 
        //  The result is a traditional radial gradient that travels from the centre of the canvas outwards

        ctx.save();
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.restore();

        // - The wrong way
        var canvas = document.getElementById('gradient_two');
        var ctx = canvas.getContext("2d");
        // Radial gradient pseudo code
        // ctx.createRadialGradient(startX, startY, startRadius, endX, endY, endRadius);
        var gradient = ctx.createRadialGradient(350, 350, 0, 50, 50, 100);
        gradient.addColorStop(0, "rgb(0, 0, 0)");
        gradient.addColorStop(1, "rgb(125, 125, 125)");

        ctx.save();
        ctx.fillStyle = gradient;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.restore();

        // Linear gradient
        var canvas = document.getElementById('gradient');
        var ctx = canvas.getContext("2d");

        // Linear gradient pseudo code
        // ctx.createLinearGradient(startX, startY, endX, endY);
        var gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
        gradient.addColorStop(0, "rgb(255, 0, 0)");
        gradient.addColorStop(0.5, "rgb(255, 255, 0)");
        gradient.addColorStop(1, "rgb(0, 255, 255)");

        ctx.save();
        ctx.fillStyle = gradient; // Use the variable created above
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.restore();

        // Shadows
        var canvas = document.getElementById('shadows');
        var ctx = canvas.getContext("2d");
        ctx.save();
        ctx.shadowBlur = 15;
        ctx.shadowColor = "rgb(0, 0, 0)";
        ctx.fillRect(20, 20, 100, 100);
        ctx.restore();

        ctx.save();
        ctx.shadowBlur = 0;
        ctx.shadowOffsetX = 6;
        ctx.shadowOffsetY = 6;
        ctx.shadowColor = "rgba(125, 125, 125, 0.5)"; // Transparent grey
        ctx.fillRect(150, 20, 100, 100);
        ctx.restore();

        // Rotating elements
        // -- Note: Rotations are managed using radians
        // Use translate to manage the rotation point
        var canvas = document.getElementById('rotating_two');
        var ctx = canvas.getContext("2d");
        ctx.save();
        ctx.translate(150, 150); // Translate to the center of the square
        ctx.rotate(Math.PI/4); // Rotate 45 degrees
        ctx.fillRect(-50, -50, 100, 100);
        ctx.restore();

        var canvas = document.getElementById('rotating');
        var ctx = canvas.getContext("2d");
        // Fail - the entire context is rotated around 0,0
        ctx.save();
        ctx.rotate(Math.PI/4); // Rotate 45 degrees (in radians)
        ctx.fillRect(100, 100, 100, 100);
        ctx.restore();

        // Scaling and translate
        var canvas = document.getElementById('scaling_two');
        var ctx = canvas.getContext("2d");
        // Same as example below but using translate to pull the start point back from the scaling
        ctx.save();
        ctx.translate(100, 100); // Regardless of the scaling factor, the starting point will be X 100 & Y 100
        ctx.scale(2, 2);
        ctx.fillRect(0, 0, 100, 100);
        ctx.restore();


        // Scaling
        var canvas = document.getElementById('scaling');
        var ctx = canvas.getContext("2d");
        ctx.fillRect(100, 100, 100, 100); // Output a standard square just to show default coordinates
        ctx.save();
        ctx.scale(2, 2); // The entire 2d rendering context is multiplied by a factor of 2
        ctx.fillRect(100, 100, 100, 100);
        ctx.restore();
        ctx.fillStyle = "rgb(255, 0, 0)";
        ctx.fillRect(200, 100, 100, 100); // Restore has been called so we are back to default scaling

        // Translations
        var canvas = document.getElementById('translations');
        var ctx = canvas.getContext("2d");
        // Place a square at point 0,0
        ctx.fillRect(0, 0, 100, 100);
        ctx.save();
        ctx.translate(100, 100); // Reset the '0' coordinates to X 100 & Y 100
        ctx.fillStyle = "rgb(0, 0, 255)";
        ctx.fillRect(0, 0, 100, 100);
        ctx.restore();

        // Lesson two below ---
        // Multiple drawing states
        var canvas = document.getElementById('state_two');
        var ctx = canvas.getContext("2d");
        ctx.fillStyle = "rgb(0, 0, 255)";
        ctx.save(); // First - blue
        ctx.fillRect(10, 10, 60, 60);

        ctx.fillStyle = "rgb(255, 0, 0)";
        ctx.save(); // Second - red
        ctx.fillRect(80, 10, 60, 60);

        ctx.restore(); // Will return last saved element - the top of the stack
        ctx.fillRect(150, 10, 60, 60); // Will render a red square

        ctx.restore(); // Go back one more step - back to First
        ctx.fillRect(220, 10, 60, 60);

        // Go back one more step - we ae already at the bottom of the stack
        // Appears that we will always stall at the bottom
        ctx.restore(); 
        ctx.fillRect(290, 10, 60, 60);

        // Saving drawing state
        var canvas = document.getElementById('state_one');
        var ctx = canvas.getContext("2d");
        ctx.fillStyle = "rgb(0, 0, 255)";
        ctx.save();
        ctx.fillRect(10, 10, 60, 60);
        // Add a new item
        ctx.fillStyle = "rgb(255, 0, 0)";
        ctx.fillRect(80, 10, 60, 60);
        // Use restore() to return to the saved drawing state 
        ctx.restore();
        ctx.fillRect(150, 10, 60, 60);

        // Bezier Curve
        var canvas = document.getElementById('ad_two');
        var ctx = canvas.getContext("2d");
        ctx.lineWidth = 8;
        ctx.beginPath();
        ctx.moveTo(10, 50);
        // bezierCurveTo(cp1x, cp1y, cp2x, cp2y, x, y); pseudo code
        ctx.bezierCurveTo(100, -40, 250, 150, 350, 50);
        ctx.stroke();

        // Quadratic Curve
        var canvas = document.getElementById('ad_one');
        var ctx = canvas.getContext("2d");
        ctx.lineWidth = 8;
        ctx.beginPath();
        ctx.moveTo(10, 10);
        ctx.quadraticCurveTo(250, 200, 450, 10);
        ctx.stroke();

        // Filled circle
        var canvas = document.getElementById('ad_one');
        var ctx = canvas.getContext("2d");
        ctx.beginPath();
        ctx.arc(600, 60, 50, 0, Math.PI*2, false);
        ctx.closePath();
        ctx.fill();

        // Lesson one below ---

    	// First canvas - two rectangles 
        var canvas = document.getElementById('firstCanvas');
        var ctx = canvas.getContext("2d");  
        // Filled
        ctx.fillRect(10, 10, 100, 100); 
        // Stroke only
        ctx.strokeRect(140, 10, 100, 100); 
        // Fill by RGB value
        ctx.fillStyle = "rgb(255,0,0)";
        ctx.fillRect(260, 10, 100, 100);
        // Stroke set by RGB value
        ctx.strokeStyle = "rgb(255,0,0)";
        ctx.strokeRect(380, 10, 100, 100);
        // Set line width
        ctx.lineWidth = 20;
        ctx.strokeStyle = "rgb(255,0,0)";
        ctx.strokeRect(510, 10, 100, 100);

        // Second canvas - paths
        var canvas = document.getElementById('secondCanvas');
        var ctx = canvas.getContext("2d");

        ctx.beginPath();
        ctx.moveTo(10, 10);
        ctx.lineTo(10, 210);
        ctx.lineTo(210, 210);
        ctx.closePath();
        ctx.fill();

        // Thick bordered path
        ctx.lineWidth = 20;
        ctx.strokeStyle = "rgb(255,0,0)";
        ctx.beginPath();
        ctx.moveTo(230, 35);
        ctx.lineTo(230, 230);
        ctx.lineTo(420, 230);
        ctx.closePath();
        ctx.stroke();

        // Third canvas - deletion
        var canvas = document.getElementById('thirdCanvas');
        var ctx = canvas.getContext("2d");
        ctx.fillStyle = "rgb(0,0,255)";
        ctx.fillRect(10, 10, 100, 100); // One
        ctx.fillStyle = "rgb(0,200,0)";
        ctx.fillRect(130, 10, 100, 100); // Two
        ctx.fillStyle = "rgb(255,0,0)"; 
        ctx.fillRect(250, 10, 100, 100);
        ctx.fillStyle = "rgb(100,255,0)"; // Three

        // Delete a portion of the canvas
        // 'Removes' the blue square
        // Co-ordinates are the same as #One
        ctx.clearRect(10, 10, 100, 100);

        // Lesson four below -- Pixel Manipulation
        // Lesson 4-a, 4-c & 4-c
        // Adding an image to the canvas
        // Effects and Accessing Pixel values
        var     canvas  = document.getElementById('manipulation_4c'),
                ctx     = canvas.getContext("2d"),
                image   = new Image();

        image.src = 'sample.jpg';

        $(image).load(function() {
                
                ctx.drawImage(image, 0, 0);

                var     imageData   = ctx.getImageData(0, 0, canvas.width, canvas.height),
                        pixels      = imageData.data,
                        numPixels   = imageData.width * imageData.height;

                $("#channelSwitcher li").on('click', function() {

                        var     $this = $(this),
                                state = $this.attr('data-state');

                        if (!$this.hasClass('active')) {

                                $this.addClass('active').siblings().removeClass('active');

                                // Loop all of the pixels and invert the color by subtracting 255 from current value
                                // Inverting a value that has already been inverted returns it to it's original state
                                for (var i = 0; i < numPixels; i++) {

                                        pixels[i*4]     = 255 - pixels[i*4];
                                        pixels[i*4+1]   = 255 - pixels[i*4+1];
                                        pixels[i*4+2]   = 255 - pixels[i*4+2];

                                }

                                ctx.clearRect(0, 0, canvas.width, canvas.height);
                                ctx.putImageData(imageData, 0, 0);

                        }
                });

                $(canvas).on('click', function(e) {
                        
                        $canvas = $(canvas);

                        var pixels = imageData.data;

                        // Determine the pixel that has been clicked on and retrieve the RGBA value
                        var canvasOffset        = $canvas.offset();
                        var canvasX             = Math.floor(e.pageX-canvasOffset.left);
                        var canvasY             = Math.floor(e.pageY-canvasOffset.top);
                        var pixelRedIndex       = ((canvasY - 1) * (imageData.width * 4)) + ((canvasX - 1) * 4);
                        var pixelColor          = "rgba("+pixels[pixelRedIndex]+", "+pixels[pixelRedIndex+1]+", "+pixels[pixelRedIndex+2]+", "+pixels[pixelRedIndex+3]+")";
                        
                        // Set the background color of the swtach DIV
                        $('#swatch').css("backgroundColor", pixelColor);
                        // Output the RGB value to the screen
                        $('#colorVal').text(pixelColor);

                });

        });

        // Lesson 4-b
        // Accessing Pixel Values and Effects

        // Lesson navigator - needs to be a plugin
        var     lessons         = $('.lesson'),
                lessonBtns      = $('#lessonBtns .btn');

        lessonBtns.on('click', function() {

                $this = $(this);

                if (!$this.hasClass('active')) {

                        lessonBtns.each(function() {
                                $(this).removeClass('active');
                        });

                        lessons.each(function() {
                                $(this).hide();
                        });

                        $('#lesson_'+$this.attr('data-lesson')).slideDown();

                        $this.addClass('active');

                }

        });

    });  
</script> 

