<<<<<<< HEAD
<li data-row="2" data-col="1" data-sizex="1" data-sizey="1" class="gs_w">
    <div data-id="valuation" data-title="Current Valuation" data-moreinfo="In billions" data-prefix="$" class="widget widget-number valuation"><h1 class="title" data-bind="title">Current Valuation</h1>

        <h2 class="value" data-bind="current | shortenedNumber | prepend prefix | append suffix">{dollarAmount}</h2>

        <p class="change-rate">
            <i data-bind-class="arrow" class="icon-arrow-up"></i><span data-bind="difference">{percentageChange}</span>
        </p>

        <p class="more-info" data-bind="moreinfo | raw">{currencyTitle}</p>

        <p class="updated-at" data-bind="updatedAtMessage">{lastUpdated}</p>
    </div>
</li>
=======
<div style="background-color: #EC663C;width: 100%;height: 100%;vertical-align: middle;text-align: center;">
	<h1 class="title" data-bind="title">{title}</h1>

	<h3 data-bind="text | raw">{text}</h3>

	<p class="more-info" data-bind="moreinfo | raw">{footer}</p>
</div>
>>>>>>> origin/Server
