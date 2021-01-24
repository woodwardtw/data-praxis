console.log('thinking grid loaded')

 jQuery( function() {
    jQuery( ".draggable" ).draggable();
  } );

let makeButton = document.getElementById('make');
makeButton.addEventListener("click", makeItem);


function makeItem(){
  console.log('make item');
  const newDiv = document.createElement("div");
  newDiv.classList.add('draggable')
  newDiv.innerHTML = '<textarea type="text" placeholder="Enter your idea here."></textarea>';
 

  // add the newly created element and its content into the DOM
  const currentDiv = document.getElementById("grid");
  currentDiv.appendChild(newDiv);
  jQuery( function() {
    jQuery( ".draggable" ).draggable();
  } );

}

