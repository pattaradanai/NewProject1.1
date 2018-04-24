<!DOCTYPE html>
<html >
  <head>
    <meta charset='utf-8' content='text/html' http-equiv='Content-type' />

    <script src='http://code.jquery.com/jquery-1.9.1.min.js' type='text/javascript'></script>
    <script src='jquery.reel.js' type='text/javascript'></script>

    <!-- Common examples style (gray background, thin fonts etc.) -->


    
   
  </head>
  <body>
          
         <img src="images/161110002/001.jpeg" width="200" height="200"
      class="reel"
      id="image"
      data-images="images/161110002/###.jpeg"
      data-frames="32"
      data-frame="32"
      data-rows="2"
      data-row="2"
      data-speed="0.3">

         <div class="reel-annotation"
      id="last_row"
      data-start="1"
      data-end="32"
      data-x="2,4,6,8,10,12,14,16,18,20,22,24,26,28,30,32"
      data-y="2"
      data-for="image">
      
    </div>

    <div class="reel-annotation"
      id="first_row"
      data-start="33"
      data-end="64"
      data-x="33,35,37,39,41,43,45,47,49,51,53,55,57,59,61,63"
      data-y="33"
      data-for="image">
      
    </div>

      
    
    
       
    

   
    
    <!-- Or Javascript alternative:

    <img id="image" src="mini.jpg" width="200" height="200" />
    <script>
      $('#image').reel({
        images:      'mini/###.jpg',
        frames:      20,
        frame:       14,
        rows:        6,
        row:         3,
        speed:       0.3,
        annotations: {
          "first_row": {
            node: { text: 'First Row', css: { width: 100 } },
            start: 1,
            end: 20,
            x: [ 10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100,105 ],
            y: 10
          },
          "last_row": {
            node: { text: 'Last Row', css: { width: 100 } },
            start: 101,
            end: 120,
            x: [ 105,100,95,90,85,80,75,70,65,60,55,50,45,40,35,30,25,20,15,10 ],
            y: 175
          }
        }
      });
    </script>

    -->

<!--
     Everything you might need to make Reel is above this line.
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
     Everything below this line is only here to make the example display illustratively
     with pretty source code, indicators, ... So you do NOT need any of it.
-->

    
    <!-- Following script line only enables in-picture indicators. To remove them simply delete it. -->
    <script> $.reel.def.indicator = 5; </script>

    
  </body>
</html>

