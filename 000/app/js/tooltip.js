 //tooltip method

$(document).ready(function() {
    let tooltip = "";
    let toolTipDiv = $(".div-tooltip");
    let toolTipElements = $(".hover-reveal");
    toolTipDiv.hide();
    let displayToolTip = function(e, obj) {
      tooltip = $(obj).data("tooltip");
      toolTipDiv.html(tooltip);
      toolTipDiv.toggle();
      toolTipDiv.css("width", "75%");
      toolTipDiv.css("height", "100%");
      toolTipDiv.css("left", "25%");
    };
  
    toolTipElements.click(function(e) {
      displayToolTip(e, this);
    });
  });
  