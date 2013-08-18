<?
$user = $_GET['user'];
$location = $_GET['location'];
?>
<script>
window.thisis.push(actT);
for (x in thisis)
{
     if(actT == thisis[x])
     {
        var thisislength = x;
        actT.x = x;
     }
};
// common variables
var iBytesUploaded = 0;
var iBytesTotal = 0;
var iPreviousBytesLoaded = 0;
var iMaxFilesize = 1048576; // 1MB
var oTimer = 0;
var sResultFileSize = '';

thisis[actT.x].secondsToTime = function(secs) { // we will use this function to convert seconds in normal time format
    var hr = Math.floor(secs / 3600);
    var min = Math.floor((secs - (hr * 3600))/60);
    var sec = Math.floor(secs - (hr * 3600) -  (min * 60));

    if (hr < 10) {hr = "0" + hr; }
    if (min < 10) {min = "0" + min;}
    if (sec < 10) {sec = "0" + sec;}
    if (hr) {hr = "00";}
    return hr + ':' + min + ':' + sec;
};

thisis[actT.x].bytesToSize = function(bytes) {
    var sizes = ['Bytes', 'KB', 'MB'];
    if (bytes == 0) return 'n/a';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};

thisis[actT.x].fileSelected = function() {

    // hide different warnings
    document.getElementById('upload_response').style.display = 'none';
    document.getElementById('error').style.display = 'none';
    document.getElementById('error2').style.display = 'none';
    document.getElementById('abort').style.display = 'none';
    document.getElementById('warnsize').style.display = 'none';

    // get selected file element
    var oFile = document.getElementById('image_file').files[0];

    // filter for image files
    //var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/tiff)$/i;
    
    var exts = ['.jpeg', '.png', '.jpg', '.zip'];
    var fileName = document.getElementById('image_file').value;
    var filter = (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
    if (filter == false) {
        document.getElementById('error').style.display = 'block';
        return;
    } else {
    	document.getElementById('valid').value = 1;
    }

    // little test for filesize
    if (oFile.size > iMaxFilesize) {
        document.getElementById('warnsize').style.display = 'block';
        return;
    }

    // get preview element
    var oImage = document.getElementById('preview');

    // prepare HTML5 FileReader
    var oReader = new FileReader();
        oReader.onload = function(e){

        // e.target.result contains the DataURL which we will use as a source of the image
        oImage.src = e.target.result;
        //thisis[actT.x].resizeImage(oImage);
        

        oImage.onload = function () { // binding onload event

            // we are going to display some custom image information here
            sResultFileSize = thisis[actT.x].bytesToSize(oFile.size);
            document.getElementById('fileinfo').style.display = 'block';
            document.getElementById('filename').innerHTML = 'Name: ' + oFile.name;
            document.getElementById('filesize').innerHTML = 'Size: ' + sResultFileSize;
            document.getElementById('filetype').innerHTML = 'Type: ' + oFile.type;
            document.getElementById('filedim').innerHTML = 'Dimension: ' + oImage.naturalWidth + ' x ' + oImage.naturalHeight;
        };
    };

    // read selected file as DataURL
    oReader.readAsDataURL(oFile);
}

thisis[actT.x].startUploading = function() {
	if(document.getElementById('valid').value == 1)
	{
    // cleanup all temp states
    iPreviousBytesLoaded = 0;
    document.getElementById('upload_response').style.display = 'none';
    document.getElementById('error').style.display = 'none';
    document.getElementById('error2').style.display = 'none';
    document.getElementById('abort').style.display = 'none';
    document.getElementById('warnsize').style.display = 'none';
    document.getElementById('progress_percent').innerHTML = '';
    var oProgress = document.getElementById('progress');
    oProgress.style.display = 'block';
    oProgress.style.width = '0px';

    // get form data for POSTing
    //var vFD = document.getElementById('upload_form').getFormData(); // for FF3
    var vFD = new FormData(document.getElementById('upload_form')); 

    // create XMLHttpRequest object, adding few event listeners, and POSTing our data
    var oXHR = new XMLHttpRequest();        
    oXHR.upload.addEventListener('progress', thisis[actT.x].uploadProgress, false);
    oXHR.addEventListener('load', thisis[actT.x].uploadFinish, false);
    oXHR.addEventListener('error', thisis[actT.x].uploadError, false);
    oXHR.addEventListener('abort', thisis[actT.x].uploadAbort, false);
    oXHR.open('POST', 'users/<? echo $user; ?>/sysapps/uploader/upload.php?location=<? echo $location; ?>');
    oXHR.send(vFD);

    // set inner timer
    oTimer = setInterval(thisis[actT.x].doInnerUpdates, 300);
	}
}

thisis[actT.x].doInnerUpdates = function() { // we will use this function to display upload speed
    var iCB = iBytesUploaded;
    var iDiff = iCB - iPreviousBytesLoaded;

    // if nothing new loaded - exit
    if (iDiff == 0)
        return;

    iPreviousBytesLoaded = iCB;
    iDiff = iDiff * 2;
    var iBytesRem = iBytesTotal - iPreviousBytesLoaded;
    var secondsRemaining = iBytesRem / iDiff;

    // update speed info
    var iSpeed = iDiff.toString() + 'B/s';
    if (iDiff > 1024 * 1024) {
        iSpeed = (Math.round(iDiff * 100/(1024*1024))/100).toString() + 'MB/s';
    } else if (iDiff > 1024) {
        iSpeed =  (Math.round(iDiff * 100/1024)/100).toString() + 'KB/s';
    }

    document.getElementById('speed').innerHTML = iSpeed;
    document.getElementById('remaining').innerHTML = '| ' + thisis[actT.x].secondsToTime(secondsRemaining);        
}

thisis[actT.x].uploadProgress = function(e) { // upload process in progress
    if (e.lengthComputable) {
        iBytesUploaded = e.loaded;
        iBytesTotal = e.total;
        var iPercentComplete = Math.round(e.loaded * 100 / e.total);
        var iBytesTransfered = thisis[actT.x].bytesToSize(iBytesUploaded);

        document.getElementById('progress_percent').innerHTML = iPercentComplete.toString() + '%';
        document.getElementById('progress').style.width = (iPercentComplete * 4).toString() + 'px';
        document.getElementById('b_transfered').innerHTML = iBytesTransfered;
        if (iPercentComplete == 100) {
            var oUploadResponse = document.getElementById('upload_response');
            oUploadResponse.innerHTML = '<h1>Please wait...processing</h1>';
            oUploadResponse.style.display = 'block';
        }
    } else {
        document.getElementById('progress').innerHTML = 'unable to compute';
    }
}

thisis[actT.x].uploadFinish = function(e) { // upload successfully finished
    var oUploadResponse = document.getElementById('upload_response');
    oUploadResponse.innerHTML = e.target.responseText;
    oUploadResponse.style.display = 'block';

    document.getElementById('progress_percent').innerHTML = '100%';
    document.getElementById('progress').style.width = '400px';
    document.getElementById('filesize').innerHTML = sResultFileSize;
    document.getElementById('remaining').innerHTML = '| 00:00:00';

    clearInterval(oTimer);
}

thisis[actT.x].uploadError = function(e) { // upload error
    document.getElementById('error2').style.display = 'block';
    clearInterval(oTimer);
}  

thisis[actT.x].uploadAbort = function(e) { // upload abort
    document.getElementById('abort').style.display = 'block';
    clearInterval(oTimer);
}
thisis[actT.x].resizeImage = function(img)
{
	var canvas = document.createElement('canvas');
	var ctx = canvas.getContext("2d");
ctx.drawImage(img, 0, 0);
	var MAX_WIDTH = 200;
var MAX_HEIGHT = 200;
var width = img.width;
var height = img.height;
 
if (width > height) {
  if (width > MAX_WIDTH) {
    height *= MAX_WIDTH / width;
    width = MAX_WIDTH;
  }
} else {
  if (height > MAX_HEIGHT) {
    width *= MAX_HEIGHT / height;
    height = MAX_HEIGHT;
  }
}
canvas.width = width;
canvas.height = height;
var ctx = canvas.getContext("2d");
ctx.drawImage(img, 0, 0, width, height);
window.ctx = ctx;
window.canvas = canvas;
var imgData = canvas.toDataURL("image/png");
}
</script>
<style>
        #progress {
    border:1px solid #ccc;
    display:none;
    float:left;
    height:14px;

    border-radius:10px;
    -moz-border-radius:10px;
    -ms-border-radius:10px;
    -o-border-radius:10px;
    -webkit-border-radius:10px;

    background: -moz-linear-gradient(top, rgba(169,228,247,1) 0%, rgba(15,180,231,1) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(169,228,247,1)), color-stop(100%,rgba(15,180,231,1)));
}
#progress_percent {
    float:right;
}
#upload_response {
    margin-top: 10px;
    padding: 20px;
    overflow: hidden;
    display: none;
    border: 1px solid #ccc;

    border-radius:10px;
    -moz-border-radius:10px;
    -ms-border-radius:10px;
    -o-border-radius:10px;
    -webkit-border-radius:10px;

    box-shadow: 0 0 5px #ccc;
    background: -moz-linear-gradient(#bbb, #eee);
    background: -ms-linear-gradient(#bbb, #eee);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #bbb), color-stop(100%, #eee));
    background: -webkit-linear-gradient(#bbb, #eee);
    background: -o-linear-gradient(#bbb, #eee);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#bbb', endColorstr='#eee');
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#bbb', endColorstr='#eee')";
    background: linear-gradient(#bbb, #eee);
}
#image_file {
    width:400px;
}
#progress_info {
    font-size:10pt;
}
#fileinfo,#error,#error2,#abort,#warnsize {
    color:#aaa;
    display:none;
    font-size:10pt;
    font-style:italic;
    margin-top:10px;
}
#preview {
    background-color:#fff;
    display:block;
    float:right;
    width:200px;
}
#upload_form > div {
    margin-bottom:10px;
}
#speed,#remaining {
    float:left;
    width:100px;
}
#b_transfered {
    float:right;
    text-align:right;
}
.clear_both {
    clear:both;
}
</style>
        <div class="container">
            <div class="upload_form_cont" style="width: 500px;height: 200px;background: white;margin: 0 auto;padding: 15px;border: 1px solid black;">
                <img id="preview" />
                <form id="upload_form" enctype="multipart/form-data" method="post" action="javascript:void();">
                    <div>
                        <div><label for="image_file">Please select image file</label></div>
                        <div style="border: 1px solid black;border-radius: 5px;width: 200px;padding: 5px;box-shadow: inset 0px 0px 13px -3px black;"><input type="file" name="image_file" id="image_file" onchange="thisis[actT.x].fileSelected();" /></div>
                    </div>
                    <div>
                    	<input id="valid" type="hidden" name="valid" value="0" />
                        <input type="button" value="Upload" onclick="thisis[actT.x].startUploading()" />
                    </div>
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error" style="display:none;">You should select valid image files only!</div>
                    <div id="error2" style="display:none;">An error occurred while uploading the file</div>
                    <div id="abort" style="display:none;">The upload has been canceled by the user or the browser dropped the connection</div>
                    <div id="warnsize" style="display:none;">Your file is very big. We can't accept it. Please select more small file</div>

                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div>
                            <div id="speed">&nbsp;</div>
                            <div id="remaining">&nbsp;</div>
                            <div id="b_transfered">&nbsp;</div>
                            <div class="clear_both"></div>
                        </div>
                        <div id="upload_response"></div>
                    </div>
                </form>
            </div>
        </div>