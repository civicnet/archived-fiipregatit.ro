<?php
  get_template_part('templates/page', 'header');

  TemplateEngine::get()->render(
    'jumbotron',
    array(
      'show_header' => false,
      'extra_class' => 'small-jumbotron search-page',
	    'algolia_search' => TemplateEngine::get()->getPartial('algolia_search_page_form')
    )
  );
?>

<div class="container" id="search-page-section">
  <div class="row justify-content-center">
  	<div id="ais-wrapper" class="col-lg-8 col-sm-12">
  		<main id="ais-main">
        <div id="algolia-stats"></div>
  			<div id="algolia-hits">
        </div>
  			<div id="algolia-pagination"></div>
  		</main>
  	</div>
  </div>
</div>

<script type="text/html" id="tmpl-instantsearch-blank">
  <?php
    TemplateEngine::get()->render(
      '404',
      array(
        'wide' => true,
      )
    );
  ?>
</script>

<script type="text/html" id="tmpl-instantsearch-hit">
		<div class="ais-hits--content">
			<h4 itemprop="name headline">
        <a
          href="{{ data.permalink }}"
          title="{{ data.title }}"
          itemprop="url"
          style="display:block; margin-bottom: 8px;">
          {{{ data._highlightResult.title.value }}}
        </a>
        <div class="content-label badge">
          {{ data.type }}
        </div>
			</h4>
			<div class="excerpt">
				<p>
				<# if (data._snippetResult['content']) { #>
				  <span class="suggestion-post-content">{{{ data._snippetResult['content'].value }}}</span>
				<# } #>
				</p>
			</div>
		</div>
		<div class="ais-clearfix"></div>
</script>

<script type="text/javascript">
	jQuery(function() {
		if(jQuery('#algolia-search-box').length > 0) {
			if (algolia.indices.searchable_posts === undefined && jQuery('.admin-bar').length > 0) {
				console.warn('It looks like you haven\'t indexed the searchable posts index. Please head to the Indexing page of the Algolia Search plugin and index it.');
			}

			/* Instantiate instantsearch.js */
			var search = instantsearch({
				appId: algolia.application_id,
				apiKey: algolia.search_api_key,
				indexName: algolia.indices.searchable_posts.name,
				urlSync: {
					mapping: {'q': 's'},
					trackedParameters: ['query']
				},
				searchParameters: {
					facetingAfterDistinct: true,
					highlightPreTag: '__ais-highlight__',
					highlightPostTag: '__/ais-highlight__'
				}
 			});

			/* Search box widget */
			search.addWidget(
				instantsearch.widgets.searchBox({
					container: '#algolia-search-box',
					placeholder: 'Scrie aici, de ex: furtună',
					wrapInput: false,
					poweredBy: true
				})
			);

			/* Stats widget */
			search.addWidget(
				instantsearch.widgets.stats({
					container: '#algolia-stats',
          autoHideContainer: true,
					templates: {
						body: function(obj) {
              if (!obj.query) {
                return '<h2>Nu ai căutat nimic încă</h2>';
              }

							return '<h2><em>' + obj.nbHits + '</em>' + ' rezultate pentru <em>"' + obj.query + '"</em></h2>';
						}
					}
				})
			);

			/* Hits widget */
			search.addWidget(
				instantsearch.widgets.hits({
					container: '#algolia-hits',
					hitsPerPage: 10,
					templates: {
						empty: wp.template('instantsearch-blank'), // 'Nu am găsit rezultate pentru "<strong>{{query}}</strong>".',
						item: wp.template('instantsearch-hit')
					},
					transformData: {
					  item: function (hit) {
							for(var key in hit._highlightResult) {
							  // We do not deal with arrays.
							  if(typeof hit._highlightResult[key].value !== 'string') {
									continue;
							  }
							  hit._highlightResult[key].value = _.escape(hit._highlightResult[key].value);
							  hit._highlightResult[key].value = hit._highlightResult[key].value.replace(/__ais-highlight__/g, '<em>').replace(/__\/ais-highlight__/g, '</em>');
							}

							for(var key in hit._snippetResult) {
							  // We do not deal with arrays.
							  if(typeof hit._snippetResult[key].value !== 'string') {
									continue;
							  }

							  hit._snippetResult[key].value = _.escape(hit._snippetResult[key].value);
							  hit._snippetResult[key].value = hit._snippetResult[key].value.replace(/__ais-highlight__/g, '<em>').replace(/__\/ais-highlight__/g, '</em>');
							}

							return hit;
						}
					}
				})
			);

			/* Pagination widget */
      // !FIXME
			/*search.addWidget(
				instantsearch.widgets.pagination({
					container: '#algolia-pagination'
				})
			);*/

			/* Start */
			search.start();
			jQuery('#algolia-search-box input').attr('type', 'search').select();
		}
	});
</script>
