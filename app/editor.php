 <head>
 <link href="./assets/css/editor.css" rel="stylesheet" />
 </head>  
 <!-- Font Family -->
            <div class='rte editor button-group' id='fontFamilyGroup' style=''>
				<div class='rte editor dropdown-label' style='float:left;'><i class='fa fa-fw fa-font'></i></div>
				<select class='rte dropdown editor' id='fontFamily' title='Font Family'><i class='fa fa-fw fa-font'></i>
					<option value="Arial, Helvetica, sans-serif" style="font-family: Arial, Helvetica, sans-serif">Arial</option>
					<option value="'Arial Black', Gadget, sans-serif" style="font-family: 'Arial Black', Gadget, sans-serif">Arial Black</option>
					<option value="'Times New Roman', serif" style="font-family: 'Times New Roman">Times New Roman</option>
					<option value="'Palatino Linotype', 'Book Antiqua', Palatino, serif" style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif">Book Antiqua</option>
					<option value="Impact, Charcoal, sans-serif", style="font-family: Impact, Charcoal, sans-serif">Impact</option>
					<option value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif" style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida Console</option>
					<option value="Tahoma, Geneva, sans-serif" style="font-family: Tahoma, Geneva, sans-serif">Tahoma</option>
					<option value="'Trebuchet MS', Helvetica, sans-serif" style="font-family: 'Trebuchet MS', Helvetica, sans-serif">Trebuchet MS</option>
					<option value="Verdana, Geneva, sans-serif" style="font-family: Verdana, Geneva, sans-serif">Verdana</option>
					<option value="Sarabun,sans-serif" style="font-family:Sarabun, sans-serif">Sarabun TH</option>
				</select>
				
                </div>

                <!-- Header Style -->
			<div class="rte editor button-group" id="parStyleGroup">
				<div class="rte editor dropdown-label" style='float:left;'><i class="fa fa-fw fa-header"></i></div>
				<select class="rte dropdown editor" id="parStyle" title="Paragraph Style" style='float:left;width:110px;'><i class="fa fa-fw fa-font"></i>
					<option value="h1" style="font-size: 2em; font-style: bold;" id="heading1">Heading 1</option>
					<option value="h2" style="font-size: 1.75em; font-style: bold;" id="heading2">Heading 2</option>
					<option value="h3" style="font-size: 1.5em; font-style: bold;">Heading 3</option>
					<option value="h4" style="font-size: 1.25em; font-weight: 900;">Heading 4</option>
					<option value="h5" style="font-size: 1.15em; font-weight: bold;">Heading 5</option>
					<option value="h5" style="font-size: 1.15em; font-weight: bold;">Heading 6</option>
					<option selected value="p" style="font-size: 1.0em; font-weight: bold;">Paragraph</option>
				</select>
            </div>

            <!-- Font Size -->
			<div class="rte editor button-group" id="textSizeGroup">
				<div class="rte editor dropdown-label" style='float:left;'><i class="fa fa-fw fa-text-height"></i></div>
				<select class="rte dropdown editor" id="fontSize" title="Font Size" style='float:left;width:50px;'><i class="fa fa-fw fa-font"></i>
					<option value="1" size="1">1</option>
					<option value="2" size="2">2</option>
					<option value="3" size="3">3</option>
					<option value="4" size="4">4</option>
					<option value="5" size="5">5</option>
					<option value="6" size="6">6</option>
					<option value="7" size="7">7</option>
				</select>
            </div>
    <!-- Font Color -->
    <div class="rte editor button-group" id="textColorGroup">
			<div class="rte editor dropdown-label" style='float:left;'><i class="fa fa-fw fa-pencil"></i></div>
				<select class="rte dropdown editor" id="textColor" title="Text Color" style='float:left;width:50px;'><i class="fa fa-fw fa-font"></i>
					<!--<option value="#eb5e6c" style="background-color: #eb5e6c; color: black;">Pig</option>-->
					<option value="#eb2538" data-textcolor="white" style="background-color: #eb2538; color: white;">Scarlet</option>
					<option value="#be1e2d" data-textcolor="white" style="background-color: #be1e2d; color: white;">Crimson</option>
					<option value="#eb25a2" data-textcolor="black" style="background-color: #eb25a2; color: black;">Hot Pink</option>
					<option value="#be1e9e" data-textcolor="black" style="background-color: #be1e9e; color: black;">Violet</option>
					<option value="#781363" data-textcolor="white" style="background-color: #781363; color: white;">Plumb</option>
					<option value="#5a25eb" data-textcolor="white" style="background-color: #5a25eb; color: white;">Indigo</option>
					<option value="#491ebe" data-textcolor="white" style="background-color: #491ebe; color: white;">Royal Blue</option>
					<option value="#2e1378" data-textcolor="white" style="background-color: #2e1378; color: white;">Navy</option>
					<option value="#25aceb" data-textcolor="black" style="background-color: #25aceb; color: black;">Sky</option>
					<option value="#1e79be" data-textcolor="white" style="background-color: #1e79be; color: white;">Aqua</option>
					<option value="#135178" data-textcolor="white" style="background-color: #135178; color: white;">Deep Sea</option>
					<option value="#25eb64" data-textcolor="black" style="background-color: #25eb64; color: black;">Lime</option>
					<option value="#1ebe6e" data-textcolor="black" style="background-color: #1ebe6e; color: black;">Emerald</option>
					<option value="#137858" data-textcolor="white" style="background-color: #137858; color: white;">Forest</option>
					<option value="#e8eb35" data-textcolor="black" style="background-color: #e8eb35; color: black;">Lemon</option>
					<option value="#d1be17" data-textcolor="white" style="background-color: #d1be17; color: white;">Mustard</option>
					<option value="#787813" data-textcolor="white" style="background-color: #787813; color: white;">Olive</option>
					<option value="#eb6725" data-textcolor="black" style="background-color: #eb6725; color: black;">Carrot</option>
					<option value="#be511e" data-textcolor="white" style="background-color: #be511e; color: white;">Pumpkin</option>
					<option value="#57391e" data-textcolor="white" style="background-color: #57391e; color: white;">Chocolate</option>
					<option value="#ffffff" data-textcolor="black" style="background-color: #ffffff; color: black;">White</option>
					<option value="#ebebeb" data-textcolor="black" style="background-color: #ebebeb; color: black;">Plaster</option>
					<option value="#bebebe" data-textcolor="black" style="background-color: #bebebe; color: black;">Concrete</option>
					<option value="#787878" data-textcolor="white" style="background-color: #787878; color: white;">Asphalt</option>
					<option value="#000000" data-textcolor="white" style="background-color: #000000; color: white;">Black</option>
					<option value="CUSTOM" style="background-color: white">CUSTOM</option>
				</select>
            </div>
            <!-- Inline Styles -->
            <div class="rte editor button-group" id="inlineStyleGroup">
				<!-- Bold -->
				<a class="rte button editor" id="bold" title="Bold" data-role='bold' href='javascript:void(0)' ><i class="fa fa-fw fa-bold"></i></a>
				<!-- Italicize -->
				<a class="rte button editor" id="italic" title="Italicize" data-role='italic' href='javascript:void(0)'><i class="fa fa-fw fa-italic"></i></a>
				<!-- Underline -->
				<a class="rte button editor" id="underline" title="Underline" data-role='underline' href='javascript:void(0)'><i class="fa fa-fw fa-underline"></i></a>
				<!-- Strikethrough -->
				<a class="rte button editor" id="strikethrough" title="Strikethrough" data-role='strikeThrough' href='javascript:void(0)'><i class="fa fa-fw fa-strikethrough"></i></a>
			</div>

            <!-- Alignment -->
			<div class="button-group" id="alignmentGroup">
				<!-- Align Left -->
				<a class="rte button editor" id="left" title="Left-align" data-role='justifyLeft' href='javascript:void(0)'><i class="fa fa-fw fa-align-left"></i></a>
				<!-- Align Center -->
				<a class="rte button editor" id="center" title="Center-align" data-role='justifyCenter' href='javascript:void(0)'><i class="fa fa-fw fa-align-center"></i></a>
				<!-- Align Right -->
				<a class="rte button editor" id="right" title="Right-align" data-role='justifyRight' href='javascript:void(0)'><i class="fa fa-fw fa-align-right"></i></a>
				<!-- Justify -->
				<a class="rte button editor" id="justify" title="Justify" data-role='justifyFull' href='javascript:void(0)'><i class="fa fa-fw fa-align-justify"></i></a>
			</div>
			
			<!-- Lists -->
			<div class="button-group" id="listsGroup">
				<!-- Unordered List -->
				<a class="rte button editor" id="unordered" title="Bulleted List" data-role='insertUnorderedList' href='javascript:void(0)'><i class="fa fa-fw fa-list-ul"></i></a>
				<!-- Ordered List -->
				<a class="rte button editor" id="ordered" title="Numbered List" data-role='insertOrderedList' href='javascript:void(0)'><i class="fa fa-fw fa-list-ol"></i></a>			
			</div>
			
			<!-- Hyperlinks 
			<div class="button-group" id="linkGroup">
				<a class="rte button editor" id="link" title="Add Hyperlink" onclick="linkSel()"><i class="fa fa-fw fa-link"></i></a>
				<a class="rte button editor" id="unlink" title="Remove Hyperlink" onclick="unlinkSel()"><i class="fa fa-fw fa-unlink"></i></a>		
			</div>-->