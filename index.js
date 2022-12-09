document.addEventListener("DOMContentLoaded", function () {
  var elms = document.getElementsByClassName("splide");

  for (var i = 0; i < elms.length; i++) {
    new Splide(elms[i]).mount();
  }

  document.getElementById("timeline-section0").style.height = String(
    Math.max(
      document.getElementById("timeline-column0").offsetHeight,
      window.innerHeight
    ) + "px"
  );

  if (window.matchMedia("(min-width: 500px)").matches) {
    document.getElementById("timeline-section1").style.height =
      String(document.getElementById("timeline-column1").offsetHeight) + "px";

    document.getElementById("timeline-section2").style.height =
      String(document.getElementById("timeline-column2").offsetHeight) + "px";

    document.getElementById("timeline-section3").style.height =
      String(document.getElementById("timeline-column3").offsetHeight) + "px";
  } else {
    // console.log("Screen less than 500px");
  }
});

$("section").each(function (index) {
  $("section").each(function (index) {
    console.log(index + ": " + $(this).class());
  });
});

document.addEventListener("DOMContentLoaded", function fitText(){
  // max font size in pixels
  const maxFontSize = 50;
  // get the DOM output element by its selector
  let outputDiv = document.getElementById(outputSelector);
  // get element's width
  let width = outputDiv.clientWidth;
  // get content's width
  let contentWidth = outputDiv.scrollWidth;
  // get fontSize
  let fontSize = parseInt(window.getComputedStyle(outputDiv, null).getPropertyValue('font-size'),10);
  // if content's width is bigger then elements width - overflow
  if (contentWidth > width){
      fontSize = Math.ceil(fontSize * width/contentWidth,10);
      fontSize =  fontSize > maxFontSize  ? fontSize = maxFontSize  : fontSize - 1;
      outputDiv.style.fontSize = fontSize+'px';   
  }else{
      // content is smaller then width... let's resize in 1 px until it fits 
      while (contentWidth === width && fontSize < maxFontSize){
          fontSize = Math.ceil(fontSize) + 1;
          fontSize = fontSize > maxFontSize  ? fontSize = maxFontSize  : fontSize;
          outputDiv.style.fontSize = fontSize+'px';   
          // update widths
          width = outputDiv.clientWidth;
          contentWidth = outputDiv.scrollWidth;
          if (contentWidth > width){
              outputDiv.style.fontSize = fontSize-1+'px'; 
          }
      }
  }
})