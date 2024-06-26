const form = document.querySelector("form"),
fileInput = form.querySelector(".file-input"),
progressArea = document.querySelector(".lista_progresu"),
uploadedArea = document.querySelector(".lista_pobranych");

form.addEventListener("click", ()=>
{
    fileInput.click();
});

fileInput.onchange = ({target}) =>
{
    let file = target.files[0];
    if(file)
        {
            let fileName = file.name;
            if(fileName.length >= 12)
                {
                    let splitName = fileName.split('.');
                    fileName = splitName[0].substring(0, 12) + "... ." + splitName[1];
                }
            uploadFile(fileName);
        }
};

function uploadFile(name)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/upload.php");
    xhr.upload.addEventListener("progress", ({loaded, total}) =>
        {
            var fileLoaded = Math.floor((loaded / total) * 100);
            let fileTotal = Math.floor(total / 1000);
            let fileSize;
            (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024) * 1024).toFixed(2) + " MB";

            let progressHTML = '<li class="row"><i class="pobierz"></i><div class="content"><div class="details"><span class="name">'+name+' ~ Pobieranie</span><span class="percent">'+fileLoaded+'%</span></div><div class="progress_bar"><div class="progress" style="width: '+fileLoaded+'%"></div></div></div></li>';
            uploadedArea.classList.add("onprogress");
            progressArea.innerHTML = progressHTML;

            if(loaded == total)
            {
                progressArea.innerHTML = "";
                let uploadedHTML = ' <li class="row"><div class="content"><i class="pobierz"></i><div class="details"><span class="name"></i>'+name+' ~ Pobieranie</span><span class="size">'+fileSize+'</span></div></div><span class="odznaczenie">&#10003;</span></li>';

                uploadedArea.classList.remove("onprogress");
                uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
            }
        });

    let formData = new FormData(form);
    xhr.send(formData);
};
