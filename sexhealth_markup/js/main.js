
         $(window).load(function(){
            var heightPage = $(window).height();
            var heightHead = $("header").height();
             var heightFooter = $("footer").height();
            $(".main-bg").height(heightPage - heightHead - heightFooter);
        });
        $(window).resize(function (){
            var heightPage = $(window).height();
            var heightHead = $("header").height();
             var heightFooter = $("footer").height();
            $(".main-bg").height(heightPage - heightHead - heightFooter);
                
            });

            $(".left").hover(
            function(){
              $(".bg-block").addClass("hover");
              $(".bg-block-l").addClass("visible");
            },
            function(){
                $(".bg-block").removeClass("hover");
                $(".bg-block-l").removeClass("visible");
            });
            $(".right").hover(
            function(){
             $(".bg-block").addClass("hover");
             $(".bg-block-r").addClass("visible");
            },
            function(){
                $(".bg-block").removeClass("hover");
                $(".bg-block-r").removeClass("visible");
            }
                );