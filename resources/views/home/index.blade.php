<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0" />
    <title>Geeks</title>
</head>
<body>
<script src=
        "https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<span class="heading">Geeks For Geeks</span>
  <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="image-wrap">

      </div>
      <button type="submit">Submit</button>
  </form>


<button id="btn-add" type="button">Add Image</button>

<style>
    .holder {
        height: 100px;
        width: 100px;
        border: 2px solid black;
    }
    img {
        max-width: 100px;
        max-height: 100px;
        min-width: 100px;
        min-height: 100px;
    }
    input[type="file"] {
        margin-top: 5px;
    }
    .heading {
        font-family: Montserrat;
        font-size: 45px;
        color: green;
    }
</style>
<script>

    var images = {!! $images !!};

    function render() {
        // let html = images.map(image => `
        //             <div class="image">
        //                 <div class="holder">
        //                     <img id="imgPreview" src="${image.src}" alt="pic" />
        //                 </div>
        //                 <input type="text" name="link" class="link" value="${index}"/>
        //                 <input type="file" name="images[]" class="photo"/>
        //             </div>
        //         `).join('')
        // images.forEach(image => {
        //
        // })
        let html = $.map( images, function( image, index ) {
            return `<div class="image">
                        <div class="holder">
                            <img id="imgPreview" src="${image.src}" alt="pic" />
                        </div>
                        <input type="text" name="no" class="no" value="${image.no}"/>
                        <input type="text" name="link_${image.no}" class="link_${image.no}" value="" placeholder="link"/>
                        <input type="file" name="images[]" class="photo"/>
                    </div>`
        }).join('');
        $('.image-wrap').html(html)
        // btnPhoto = $('.photo');
        // console.log(btnPhoto.length)
        // for(let i = 0; i < btnPhoto.length; i++) {
        //     btnPhoto[i].addEventListener('click', function() {
        //         changePreview(i)
        //     })
        // }

    }

    function changePreview(index) {
        console.log(index)
    }

    function add() {
        no = $('.image').length;
        images.push({name: '1.jpg', src: '1.jpg', link: 'link1', no: no});
    }

    $('#btn-add').click(function() {
        add();
        render();
    })

    render()
    $(".image-wrap").on('change', '.photo', function () {
        // console.log($(this).parent('.image').find(`[id='imgPreview']`))
        let url = $(this).parent().find(`[id='imgPreview']`);

        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                // $("#imgPreview")
                // .attr("src", event.target.result);
                url.attr("src", event.target.result);
                // console.log(event.target.result)

            };
            reader.readAsDataURL(file);
        }
    });
</script>
</body>
</html>
