<div data-id="convergence" data-title="Convergence" style="background-color:#f1e2ff; height: 100%; width: 100%;" class="widget widget-graph convergence rickshaw_graph"><h1 class="title" data-bind="title" style="text-align: center;">{title}</h1>

    <h2 class="value" data-bind="current | prettyNumber | prepend prefix" style="text-align: center;">{value}</h2>

    <p class="more-info" data-bind="moreinfo"></p>
    <svg style="width: 100%;">
    
    {data}
    
    <g class="y_ticks plain"><g transform="translate(0,360)" style="opacity: 1;"><line class="tick" x2="4" y2="0"></line><text x="7" y="0" dy=".32em" text-anchor="start"></text></g>

    <g transform="translate(0,285.74257425742576)" style="opacity: 1;"><line class="tick" x2="4" y2="0"></line><text x="7" y="0" dy=".32em" text-anchor="start">{y0}</text></g>
    <g transform="translate(0,211.4851485148515)" style="opacity: 1;"><line class="tick" x2="4" y2="0"></line><text x="7" y="0" dy=".32em" text-anchor="start">{y1}</text></g>
    <g transform="translate(0,137.22772277227722)" style="opacity: 1;"><line class="tick" x2="4" y2="0"></line><text x="7" y="0" dy=".32em" text-anchor="start">{y2}</text></g>
    <g transform="translate(0,62.97029702970298)" style="opacity: 1;"><line class="tick" x2="4" y2="0"></line><text x="7" y="0" dy=".32em" text-anchor="start">{y3}</text></g>

    <path class="domain" d="M4,0H0V360H4"></path></g><g class="y_grid"><g transform="translate(0,360)" style="opacity: 1;"><line class="tick" x2="610" y2="0"></line><text x="613" y="0" dy=".32em" text-anchor="start"></text></g>

    <path class="domain" d="M610,0H0V360H610"></path></g></svg>

    {xAxis}


</div>