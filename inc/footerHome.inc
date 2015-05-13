<!-- FOOTER -->
        <div id="footer">
            <map name="dmshandbook" id="dmshandbook">
                <area alt="Doctors' Management Service, Inc. 2012 Handbook"
                shape="rect" coords="1, 1, 135, 60" href="contact.php">
            </map>
            <div class="one-fourth">
                <p class="bold">
                    <span aria-hidden="true" data-icon="&#59254;"></span><br />
                    <a href="http://www.salusresourcegroup.com/">
                        The Salus Resource Group
                    </a>
                </p>
                <p>
                    <q>Providing Comprehensive Solutions To The Dental And
                    Medical Community To Enhance Personal and Professional
                    Growth.</q>
                </p>
            </div>
            <div class="one-fourth">
                <p class="bold"><span aria-hidden="true" data-icon="&#127916;"></span><br /><a href="https://www.youtube.com/user/DoctorsManagementSvc">YouTube<br />Channel</a></p>
                <p>Subscribe to our YouTube<br />Channel to stay up to date.</p>
            </div>
            <div class="one-fourth">
                <p class="bold">
                    <span aria-hidden="true" data-icon="&#128214;"></span><br />
                    <a href="contact.php">
                        RECEIVE OUR 2015 HANDBOOK
                    </a>
                </p>
                <p>
                    Please contact us to receive your copy.
                </p>
            </div>
            <div class="one-fourth">
                <p class="bold">
                    <span data-icon="&#128362;"></span><br /><a href="contact.php">New EHR<br />Implementation</a></p>
                    <p>Please contact us to discuss details and set up a free demonstration!</p>
            </div>
            <div id="footerNav">
                <nav>
                    <ul>
                        <li>
                            Home
                        </li>
                        <!--<li>
                            <a href="careers.php">Careers</a>
                        </li>-->
                        <li>
                            <a href="contact.php">Contact Us</a>
                        </li>
                        <li>
                            <a href="https://docs.google.com/forms/d/188uq-xE4kSRhVoEzV_LruxKI6PgdVeIRhf8_SWJlGXM/viewform?usp=send_form">Careers</a>
                        </li>
                        <li>
                            <a href="privacypolicy.php">Privacy
                            Policy</a>
                        </li>
                        <li>
                            <a href="sitemap.php">Site Map</a>
                        </li>
                    </ul>
                </nav>
                <div style="width:56%;height:auto;float:right;">
                    <p id="addressCredits"><a href=
                    "mailto:tim@doctorsmanagementservice.org">tim@doctorsmanagementservice.org</a><br>
                    <strong>DMS |</strong> 944 Washington St., Suite 1 South
                    Easton, MA 02375 <strong><br>P</strong> 508.238.8646
                    <strong>F</strong> 508.230.9772<br>
                    © 2014 Doctors' Management Service, Inc. All Rights Reserved.<br>
                    Site designed by <a href=
                    "http://www.ncdesigns-studio.com/index.html">NC Designs</a>.</p>
                </div>
            </div>
            <!-- END FOOTER -->
        <script type="text/javascript">
/*
        Copyright 2011 : Simone Gianni <simoneg@apache.org>

        -- update by NC Designs Studio 08/11/12 --
        Entered in specific Youtube user.
        -- update by tcuttrissweb --
        adds in title besdie thumbs in carousel.
        adjusted css from the original to make room for this
        allows resizing
        to adjust size of the player adjust the css for:
        .youtube iframe.player width / height accordingly.

        Released under The Apache License 2.0 
        http://www.apache.org/licenses/LICENSE-2.0

        */

        (function() {
        function createPlayer(jqe, video, options) {
        var ifr = $('iframe', jqe);
        if (ifr.length === 0) {
            ifr = $('<iframe scrolling="no">');
            ifr.addClass('player');
        }
        var src = 'http://www.youtube.com/embed/' + video.id;
        if (options.playopts) {
            src += '?';
            for (var k in options.playopts) {
                src += k + '=' + options.playopts[k] + '&';
            }
            src += '_a=b';
        }
        ifr.attr('src', src);
        jqe.append(ifr);
        }

        function createCarousel(jqe, videos, options) {
        var car = $('div.carousel', jqe);
        if (car.length === 0) {
            car = $('<div>');
            car.addClass('carousel');
            jqe.append(car);

        }
        $.each(videos, function(i, video) {

            options.thumbnail(car, video, options);
        });
        }

        function createThumbnail(jqe, video, options) {

        var imgurl = video.thumbnails[0].url;
        var img = $('img[src="' + imgurl + '"]');
        var desc;
        var container;
        if (img.length !== 0) return;
        img = $('<img align="left">');
        img.addClass('thumbnail');
        jqe.append(img);
        img.attr('src', imgurl);
        img.attr('title', video.title);
        img.click(function() {
            options.player(options.maindiv, video, $.extend(true, {}, options, {
                playopts: {
                    autoplay: 1
                }
            }));
        });
        desk = $('<p class="yt-descript">' + video.title + '<\/p>');
        jqe.append(desk);
        desk.click(function() {
            options.player(options.maindiv, video, $.extend(true, {}, options, {
                playopts: {
                    autoplay: 1
                }
            }));
        });
        }

        var defoptions = {
        autoplay: false,
        user: null,
        carousel: createCarousel,
        player: createPlayer,
        thumbnail: createThumbnail,
        loaded: function() {},
        playopts: {
            autoplay: 0,
            egm: 1,
            autohide: 1,
            fs: 1,
            showinfo: 1
        }
        };


        $.fn.extend({
        youTubeChannel: function(options) {
            var md = $(this);
            md.addClass('youtube');
            md.addClass('youtube-channel');
            var allopts = $.extend(true, {}, defoptions, options);
            allopts.maindiv = md;
            $.getJSON('http://gdata.youtube.com/feeds/users/' + allopts.user + '/uploads?alt=json-in-script&format=5&callback=?', null, function(data) {
                var feed = data.feed;
                var videos = [];
                $.each(feed.entry, function(i, entry) {

                    var video = {
                        title: entry.title.$t,
                        id: entry.id.$t.match('[^/]*$'),
                        thumbnails: entry.media$group.media$thumbnail
                    };
                    videos.push(video);
                });
                allopts.allvideos = videos;
                allopts.carousel(md, videos, allopts);
                allopts.player(md, videos[0], allopts);
                allopts.loaded(videos, allopts);
            });
        }
        });

        })();

        $(function() {
        $('#player').youTubeChannel({
        user: 'DoctorsManagementSvc'
        });
        });
        //]]>
        </script><!-- END YOUTUBE CAROUSEL -->
    </body>
</html>