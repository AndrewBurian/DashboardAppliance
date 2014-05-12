<div style="background-color: #EC663C;width: 100%;height: 100%;vertical-align: middle;text-align: center;">
<h1 class="title" data-bind="title">{title}</h1>

<ol>
  <li data-foreach-item="items">
    <span class="label" data-bind="item.label">{olabel}</span>
    <span class="value" data-bind="item.value">{olvalue}</span>
  </li>
  <li data-foreach-item="items">
    <span class="label" data-bind="item.label">{olabel2}</span>
    <span class="value" data-bind="item.value">{olvalue2}</span>
  </li>
</ol>

<!--<ul class="list-nostyle">
  <li data-foreach-item="items">
    <span class="label" data-bind="item.label">{ulable}</span>
    <span class="value" data-bind="item.value">{ulvalue}</span>
  </li>
</ul>-->

<p class="more-info" data-bind="moreinfo">more info here</p>
<p class="updated-at" data-bind="updatedAtMessage">{footer}</p>
</div>