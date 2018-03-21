
        $('#search').focus(function() {
            $(this).attr('placeholder', 'Enter text')
        }).blur(function() {
            $(this).attr('placeholder', 'Search on site')
        })
        $('#article-search').focus(function() {
            $(this).attr('placeholder', 'Enter text')
        }).blur(function() {
            $(this).attr('placeholder', 'Start typing first letter or a word')
        })
        $('textarea').focus(function() {
            $(this).attr('placeholder', 'Enter text')
        }).blur(function() {
            $(this).attr('placeholder', 'Your comment here…')
        })
         $(window).load(function(){
            var heightPage = $(window).height();
            var heightHead = $("header").height();
            var contentHeight = $(".main-content").height();
            $(".content").height(heightPage - heightHead);
             $(".section").height(heightPage - heightHead);
             $(".aside-left").height(contentHeight);
             $(".v-txt").height(contentHeight);
        });
        $(window).resize(function (){
            var heightPage = $(window).height();
            var heightHead = $("header").height();
                $(".content").height(heightPage - heightHead);
                $(".section").height(heightPage - heightHead);
                
            });
        $(document).ready(function() {
			$('.content').fullpage({
                menu: '#menu',
				anchors: ['firstPage', 'secondPage', '3rdPage', '4rdPage'],
				css3: true
			});
            var list = $('#lista2');
            if(list.length){
                list.als({
					visible_items: 6,
					scrolling_items: 1,
					orientation: "vertical",
					circular: "yes",
					autoscroll: "no",
					start_from: 1
				});
            }
		});
        $('.read_more').click(function(){
                $(this).text(function(i,old){
                    return old=='Read more' ?  'Less' : 'Read more';
                });
            $(".hidden-txt").toggleClass("expand_txt");
            });