<?
if ( is_array( $arParams['IBLOCK_ID'] ) )
{
	$arParams['IBLOCK_ID'] = implode( '|', $arParams['IBLOCK_ID'] );
}
?>

<style type="text/css">
#bmhouse-search-block
{
	position: relative;
	width: 390px;
	box-sizing: content-box;
}

#bmhouse-search-block *
{
	box-sizing: content-box;
}

#bmhouse-search-block input
{
	width: 350px;
    padding: 10px 17px;
    font-size: 13px;
    font-family: Verdana, sans-serif;
    border-radius: 20px;
    border: 3px solid #5599cc;
	background-color: #fff;
	transition: background-color 0.3s;
	position: absolute;
	top: 0;
	left: 0;
	z-index: 20;
}

#bmhouse-search-block input:focus
{
	outline: none;
	border-color: #3377aa;
}

#bmhouse-search-block span
{
	background: url('/bitrix/components/bmhouse/search/templates/.default/img/search.svg') no-repeat;
	height: 18px;
	width: 18px;
	display: block;
	position: absolute;
	right: 17px;
	top: 10px;
	z-index: 30;
}

#bmhouse-search-result
{
	width: 384px;
    padding: 17px 0;
    font-size: 13px;
    font-family: Verdana, sans-serif;
    border-radius: 20px;
	background-color: #fff;
	border: 3px solid #3377aa;
	position: absolute;
	top: 1px;
	left: 0;
	transition: padding-top 0.3s;
	z-index: 10;
}

#bmhouse-search-result.loading
{
	padding-top: 33px;
	background: url('/bitrix/components/bmhouse/search/templates/.default/img/loader.svg') 50% 100% no-repeat #fff;
}

#bmhouse-search-result.open
{
	padding-top: 38px;
	padding-bottom: 2px;
}

#bmhouse-search-result .bmhouse-search-result-empty
{
	text-align: center;
	color: #5599cc;
}

#bmhouse-search-result .bmhouse-search-result-block
{
	padding: 12px 4px 4px;
}

#bmhouse-search-result .bmhouse-search-result-item
{
	cursor: pointer;
	display: none;
}

#bmhouse-search-result .bmhouse-search-result-item[data-page="0"]
{
	display: block;
}

#bmhouse-search-result .bmhouse-search-result-item-picture
{
	height: 50px;
	width: 50px;
	display: inline-block;
	margin-right: 10px;
	position: relative;
	text-align: center;
}

#bmhouse-search-result .bmhouse-search-result-item-picture-big
{
	position: absolute;
	z-index: 40;
	top: 0;
	left: 50px;
	display: none;
	border: 3px solid #3377aa;
	overflow: hidden;
	background-color: #fff;
	border-radius: 8px;
	max-width: 350px;
	max-height: 250px;
	box-shadow: 0 0 20px #555;
}

#bmhouse-search-result .bmhouse-search-result-item-picture:hover .bmhouse-search-result-item-picture-big
{
	display: block;
}

#bmhouse-search-result .bmhouse-search-result-item-picture img
{
	border-radius: 0;
	max-width: 100%;
	max-height: 100%;
	height: auto;
	width: auto;
	display: block;
	margin: auto;
}

#bmhouse-search-result .bmhouse-search-result-item-picture-big img
{
	width: auto;
	height: auto;
	max-width: 350px;
	max-height: 250px;
}

#bmhouse-search-result .bmhouse-search-result-item-data
{
	display: block;
	float: right;
	width: 315px;
	position: relative;
	top: -4px;
	color: #5599cc;
	transition: color 0.3s;
}

#bmhouse-search-result .bmhouse-search-result-item:hover .bmhouse-search-result-item-data
{
	color: #3377aa;
}

#bmhouse-search-result .bmhouse-search-result-item-article
{
	font-size: 12px;
}

#bmhouse-search-result .bmhouse-search-result-item-price
{
	font-weight: bold;
}

#bmhouse-search-result-more
{
	text-align: center;
    background-color: #5599cc;
    color: #fff;
    width: 150px;
    margin: auto;
    border-radius: 8px;
    font-size: 12px;
    line-height: 24px;
    margin-top: 15px;
	cursor: pointer;
	transition: background-color 0.3s;
}

#bmhouse-search-result-more:hover
{
	background-color: #3377aa;
}
</style>



<script type="text/javascript">
$( document ).ready(
	function ()
	{
		$( 'body' ).click(
			function ()
			{
				if ( $( '#bmhouse-search-result-more' ).data( 'loading' ) != 'y' )
				{
					$( '#bmhouse-search-result.open' ).removeClass( 'open' );
					$( '#bmhouse-search-result' ).html( '' );
				}
			}
		);
		
		
		$( '#bmhouse-search-input' ).on(
			'click keyup',
			function ()
			{
				var _this = $( this );
				var query = $( this ).val();
				
				$( '#bmhouse-search-result' ).html( '' );
				
				if ( query.length >= parseInt( <?=$arParams['MIN_CHARS']?> ) )
				{
					$( '#bmhouse-search-result' ).removeClass( 'open' );
					$( '#bmhouse-search-result' ).removeClass( 'loading' );
					$( '#bmhouse-search-result' ).addClass( 'loading' );
					
					$.post(
						'/bitrix/components/bmhouse/search/ajax.php',
						{
							QUERY: query,
							PARAMS:
							{
								IBLOCK_ID: '<?=$arParams['IBLOCK_ID']?>',
								SEARCH_BY_ARTICLE: '<?=$arParams['SEARCH_BY_ARTICLE']?>',
								ARTICLE_PROPERTY: '<?=$arParams['ARTICLE_PROPERTY']?>',
								SHOW_ARTICLE: '<?=$arParams['SHOW_ARTICLE']?>',
								SHOW_PRICE: '<?=$arParams['SHOW_PRICE']?>',
								PRICE_CODE: '<?=$arParams['PRICE_CODE']?>',
								SHOW_SECTIONS: '<?=$arParams['SHOW_SECTIONS']?>',
								ONLY_WITH_PICTURE: '<?=$arParams['ONLY_WITH_PICTURE']?>',
								ONLY_AVAILABLE: '<?=$arParams['ONLY_AVAILABLE']?>',
								ONLY_WITH_PRICE: '<?=$arParams['ONLY_WITH_PRICE']?>',
								SEARCH_DESCRIPTION: '<?=$arParams['SEARCH_DESCRIPTION']?>',
								SORT_BY: '<?=$arParams['SORT_BY']?>',
								SEARCH_BY_PROPS: '<?=$arParams['SEARCH_BY_PROPS']?>',
							}
						},
						function ( data )
						{
							if ( _this.val() == query )
							{
								$( '#bmhouse-search-result' ).removeClass( 'loading' );
								$( '#bmhouse-search-result' ).addClass( 'open' );
								
								if ( data.ITEMS_COUNT == 0 )
								{
									$( '#bmhouse-search-result' ).html( '<div class="bmhouse-search-result-empty"><?=GetMessage( 'ITEMS_NOT_FOUND' )?></div>' );
								}
								else
								{
									var itemsCount = parseInt( <?=$arParams['ITEMS_COUNT']?> );
									var html = '<div class="bmhouse-search-result-block" >';
									
									for ( var i = 0; i < data.ITEMS_COUNT; i++ )
									{
										var page = Math.floor( i / itemsCount );
										
										var item = data.ITEMS[i];
										
										
										html += '<div class="bmhouse-search-result-item" data-url="' + item.URL + '" data-page="' + page +  '">';
										
										html += '<div class="bmhouse-search-result-item-picture">';
										
										if ( item.PICTURE )
										{
											html += '<img src="' + item.PICTURE + '" />';
											
											html += '<div class="bmhouse-search-result-item-picture-big" ><img src="' + item.PICTURE + '" /></div>';
										}
										
										html += '</div>';
										
										html += '<div class="bmhouse-search-result-item-data">';
										
										html += '<div class="bmhouse-search-result-item-name">' + item.NAME + '</div>';
										
										
										if ( item.ARTICLE )
										{
											html += '<div class="bmhouse-search-result-item-article"><?=GetMessage( 'ARTICLE' )?>: ' + item.ARTICLE + '</div>';
										}
										
										if ( item.DESCRIPTION )
										{
											html += '<div class="bmhouse-search-result-item-description">' + item.DESCRIPTION + '</div>';
										}
										
										if ( parseInt( item.PRICE ) )
										{
											html += '<div class="bmhouse-search-result-item-price">' + parseInt( item.PRICE ) + ' <?=GetMessage( 'RUB' )?></div>';
										}
										else if ( parseInt( item.MIN_PRICE ) )
										{
											html += '<div class="bmhouse-search-result-item-price"><?=GetMessage( 'FROM' )?> ' + parseInt( item.MIN_PRICE ) + ' <?=GetMessage( 'TO' )?> ' + parseInt( item.MAX_PRICE ) + ' <?=GetMessage( 'RUB' )?></div>';
										}
										
										html += '</div>';
										
										html += '<div style="clear: both; height: 10px;"></div>';
										
										html += '</div>';
										
										
									}
									
									
									if ( data.ITEMS_COUNT > itemsCount )
									{
										html += '<div id="bmhouse-search-result-more"><?=GetMessage( 'SHOW_MORE' )?></div>';
									}
									
									
									html += '</div>';
									
									$( '#bmhouse-search-result' ).html( html );
								}
								
								
								
								$.post(
									'/bitrix/components/bmhouse/search/save_stats.php',
									{
										QUERY: query
									}
								);
							}
						},
						'json'
					);
				}
				else
				{
					$( '#bmhouse-search-result' ).html( '' );
					$( '#bmhouse-search-result' ).removeClass( 'open' );
					$( '#bmhouse-search-result' ).removeClass( 'loading' );
				}
			}
		);
		
		
		
		$( 'body' ).on(
			'click',
			'.bmhouse-search-result-item',
			function ()
			{
				var url = $( this ).data( 'url' );
				
				window.location.href = url;
			}
		);
		
		
		$( 'body' ).on(
			'click',
			'#bmhouse-search-result-more',
			function ()
			{
				$( '#bmhouse-search-result-more' ).data( 'loading', 'y' );
				
				var visibleCount = $( '.bmhouse-search-result-item:visible' ).length;
				var currentPage = $( '.bmhouse-search-result-item:visible' ).eq( visibleCount - 1 ).data( 'page' );
				
				if ( !currentPage )
				{
					currentPage = 0;
				}
				
				var nextPage = currentPage + 1;
				
				$( '.bmhouse-search-result-item[data-page="' + nextPage + '"]' ).fadeIn( 500 );
				
				var invisibleCount = $( '.bmhouse-search-result-item:hidden' ).length;
				
				if ( invisibleCount == 0 )
				{
					$( '#bmhouse-search-result-more' ).hide();
				}
				
				setTimeout(
					function ()
					{
						$( '#bmhouse-search-result-more' ).data( 'loading', '' );
					},
					100
				);
			}
		);
		
	}
);
</script>