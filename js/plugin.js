var renderProgress = function(el) {
  var start = 0;
  var end = el.dataset.progress;
  
  var colours = {
    fill: '#' + el.dataset.fillColour,
    track: '#' + el.dataset.trackColour,
    text: '#' + el.dataset.textColour,
    stroke: '#' + el.dataset.strokeColour,
  }
  
  var radius = 60;
  var border = el.dataset.trackWidth;
  var strokeSpacing = el.dataset.strokeSpacing;
  var endAngle = Math.PI * 2;
  var formatText = d3.format('0.0%');
  var boxSize = radius * 2;
  var count = end;
  var progress = start;
  var step = end < start ? -0.01 : 0.01;
  
  //Define the circle
  var circle = d3.arc()
    .startAngle(0)
    .innerRadius(radius)
    .outerRadius(radius - border);
  
  //setup SVG wrapper
  var svg = d3.select(el)
    .append('svg')
    .attr('width', boxSize)
    .attr('height', boxSize);
  
  // ADD Group container
  var g = svg.append('g')
    .attr('transform', 'translate(' + boxSize / 2 + ',' + boxSize / 2 + ')');
  
  //Setup track
  var track = g.append('g').attr('class', 'radial-progress');
  track.append('path')
    .attr('class', 'radial-progress__background')
    .attr('fill', colours.track)
    .attr('stroke', colours.stroke)
    .attr('stroke-width', strokeSpacing + 'px')
    .attr('d', circle.endAngle(endAngle));
  
  //Add colour fill
  var value = track.append('path')
    .attr('class', 'radial-progress__value')
    .attr('fill', colours.fill)
    .attr('stroke', colours.stroke)
    .attr('stroke-width', strokeSpacing + 'px');
  
  //Add text value
  var numberText = track.append('text')
    .attr('class', 'radial-progress__text')
    .attr('fill', colours.text)
    .attr('font-size', '30px')
    .attr('text-anchor', 'middle')
    .attr('dy', '.5rem');
  
  function update(progress) {
	  
    //update position of endAngle
    value.attr('d', circle.endAngle(endAngle * progress));
    //update text value
   numberText.text(formatText(progress));
	  	$(".radial-progress__text").each(function(){
		var yazi=$( this ).text();
		var lastChar = yazi.substr(yazi.length - 1); // => "1"	
			if(lastChar=="%"){
		$( this ).text(yazi.slice(0,-1));}
		
	});
  };
  
  function iterate() {
    //call update to begin animation
    update(progress);
    
    if (count > 0) {
      //reduce count till it reaches 0
      count--;
      //increase progress
      progress += step;
      //Control the speed of the fill
      setTimeout(iterate, 10);

    }
  };
  
  iterate();
	
}

Array.prototype.slice.call(document.querySelectorAll('.progress')).forEach(el => {
  renderProgress(el);
	
});