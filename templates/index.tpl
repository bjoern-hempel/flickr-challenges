<!DOCTYPE html>
<html lang="en" style="width: 100%%; height: 100%%; padding: 0; margin: 0;">
    <head>
        <title>Die Flickr Challenge</title>
        <script src="js/main.js"></script>

        <script type="text/javascript">

            document.addEventListener("DOMContentLoaded", function(event) {
                compare();
            });

        </script>
    </head>
    <body style="width: 100%%; height: 100%%; padding: 0; margin: 0; background-color: #c0c0c0; background-image: url('https://live.staticflickr.com/65535/48976646986_1d786e7d56_h.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;;">
        <table border="0" style="width: 100%%; height: 100%%;"><tr><td valign="middle" align="center" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 40px; font-style: normal; font-variant: normal; font-weight: 400; background-color: rgba(255, 255, 255, 0.5);">
            <table border="0" cellpadding="20" style="background-color: rgba(255, 255, 255, 0.5);">
                <!--tr><td colspan="4">Hier schummelt niemand! Und wer 6 Likes mehr hat, muss ja gar nicht meckern 😉</td></tr>-->
                <tr><td colspan="4">%s</td></tr>
                <tr>
                    <td></td>
                    <td align="center" style="font-size: 60px;"><img src="/images/prinzen1.jpg" style="max-height: 80px; border: 1px solid; #808080; border-radius: 10px; " alt="Avatar: Die Prinzen" title="Avatar: Die Prinzen"> <b>Isa</b></td>
                    <td>vs.</td>
                    <td align="center" style="font-size: 60px;"><img src="/images/sido1.jpg" style="max-height: 80px; border: 1px solid #808080; border-radius: 10px; " alt="Avatar: Sido" title="Avatar: Sido"> <b>Bj&ouml;rn</b></td>
                </tr>
                <tr><td style="font-size: 20px;">Image</td><td align="center"><img style="width: 200px;" src="%s"></td><td>vs.</td><td align="center"><img style="width: 200px;" src="%s"></td></tr>
                <tr><td style="font-size: 20px;">Views</td><td align="center" id="viewsIsa">%d</td><td>vs.</td><td align="center" id="viewsBjoern">%d</td></tr>
                <tr><td style="font-size: 20px;">Likes</td><td align="center" id="likesIsa">%d</td><td>vs.</td><td align="center" id="likesBjoern">%d</td></tr>
                <tr><td style="font-size: 20px;">Comments</td><td align="center" id="commentsIsa">%d</td><td>vs.</td><td align="center" id="commentsBjoern">%d</td></tr>
                <tr><td align="center" colspan="4" style="font-size: 20px;"><b>Stand:</b> %s</td>
            </table>
        </td></tr></table>
    </body>
</html>

