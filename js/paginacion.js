var tabButtons = document.querySelectorAll('.tabContainer .buttonContainer button');
var tabPanels = document.querySelectorAll('.tabContainer .tabPanel');

/*Función de cambio de pestañas */

function showPanel(panelIndex, colorCode){
	tabButtons.forEach(function(node){
		node.style.backgroundColor="";
		node.style.color="";
	});

	tabButtons[panelIndex].style.backgroundColor="#0060AF";
	tabButtons[panelIndex].style.color="black";
	tabPanels.forEach(function(node){
		node.style.display="none";
	});

	tabPanels[panelIndex].style.display="block";
	tabPanels[panelIndex].style.backgroundColor="#fff";
}

showPanel(0, '#0060AF');
