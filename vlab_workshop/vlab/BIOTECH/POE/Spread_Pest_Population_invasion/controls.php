<!--
Developed under a Research grant from NMEICT, MHRD
by
Amrita CREATE (Center for Research in Advanced Technologies for Education),
VALUE (Virtual Amrita Laboratories Universalizing Education)
Amrita University, India 2009 - 2013
http://www.amrita.edu/create
-->


<ul>
<li><h1>Variables<span></span></h1>
<div class="varBox">
<br />
<p class="varTitle">Length of habitat:</p>
<input type="text" class="wideTxtArea" name="LOH" id="LOH" value="100" onkeypress=" onlyNumbers(event)" />
<p class="varTitle">Number of years:</p>
<input type="text" class="wideTxtArea" name="NOY" id="NOY" value="50" onkeypress=" onlyNumbers(event)"/>
<p class="varTitle">Establishment: </p>
<input type="text" class="wideTxtArea" name="ESTD" id="ESTD" value="10" onkeypress=" onlyNumbers(event)" />
<p class="varTitle">Initial pest population:</p>
<input type="text" class="wideTxtArea" name="IPP" id="IPP" value="50" onkeypress=" onlyNumbers(event)" />
<p class="varTitle">Disperse Rate: 0.<span id="range">2</span></p>
<input type="range" class="rangeSlider" min="1" max="9" id="DR" name="DR" value="2"  onchange="showValue(this.value)" />
<div class="rangeVals">
<span class="minrange">0.1</span><span class="maxrange">0.9</span>
<div class="clear"></div>
</div>
<p class="varTitle">Population Growth Rate:</p>
<input type="text" class="wideTxtArea" name="PGR" id="PGR" value="4"  onkeypress=" onlyNumbers(event)" />

</div>
<br/><br />
</li>
<li><h1>Controls<span></span></h1>
<div class="varBox">
<br/><br/><br /><br/>
<p><input type="button" class="subButton" name="PG" value="Plot Graph" onClick="draw_graph()" id="PG"></p>
<p><input type="button" class="subButton" name="Re_set" value="Reset" onClick="Reset();window.location.reload();" id="Re_set"></p>

</div>
</li>

</ul>