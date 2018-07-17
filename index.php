<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Ajax Contact Form</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript" src="main.js" /></script><style>.form-control{display:block;width:100%;height:auto;padding:6px 12px;font-size:14px;line-height:1.42857143;color:#8224e3;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s}.form-control:focus{border-color:#66afe9;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)}</style>
<div class=row>
<fieldset id="contact_form">
<div id="result" class="row">
</div>
<div class=row>
<div class="col-xs-6 col-xs-12">
<h4>Your Name :</h4>
&nbsp;
<input type="text" class="form-control" name="name" id="name" autocomplete=off placeholder="Enter Your Name" />
</div>
<div class="col-xs-6 col-xs-12 last">
<h4>Your Email :</h4>
&nbsp;
<input type="email" class="form-control" name="email" id="email" autocomplete=off placeholder="Enter Your Email" />
</div></div>
&nbsp;
<div class=row><div class="col-xs-12 col-md-12"><h4>Your Message :</h4>
&nbsp;
<textarea rows=3 name="message" id="message" class=form-control placeholder="Enter Your Name"></textarea>
</div>
&nbsp;
<div class="col-xs-12 col-md-12 aligncenter">
<input type=submit class="btn btn-primary btn-lg" style=width:100% id="submit_btn" value=Submit /></div></div>
</fieldset>
</div>
</body>
</html>