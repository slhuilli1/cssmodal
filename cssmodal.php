<?php
	defined('_JEXEC') or die('Access deny');

	class plgContentCssModal extends JPlugin 
	{
		function onContentPrepare($content, $article, $params, $limit){				
			$document = JFactory::getDocument();
			$document->addStyleSheet('plugins/content/cssmodal/style.css');	
			
			$re = '/{cssmodal\s*"(.*)"\s*"(.*)"\s*"(.*)"}/m';
			

			preg_match_all($re, $article->text, $matches, PREG_SET_ORDER, 0);

		
			foreach($matches as $unElt)
			{
				echo "<pre>";
				print_r($unElt);
				echo "</pre>";
				$str= '	<div class="wrapper">
						<a href="#demo-modal">'.$unElt[1].'</a>
					</div>

					<div id="demo-modal" class="sebmodal">
						<div class="sebmodal__content">
							<h1>'.$unElt[2].'</h1>
							 <p>'.$unElt[3].'</p>

							
							<a href="#" class="sebmodal__close">&times;</a>
						</div>
					</div>';
//				echo $str;
				$article->text = str_replace($unElt[0],$str,$article->text);
				
			}
			
		}	
	}