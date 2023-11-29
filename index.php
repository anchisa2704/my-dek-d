<?php require("functions.php"); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mali:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Blog</title>
</head>

<body>
    <section class="layout">
        <div class="creatBlogContainer">
            <h1 class="createTopic">ตั้งกระทู้ใหม่</h1>
            <form action="#" method="post">
                <div class="topicContainer">
                    <p id="topicCount" class="countChar"></p>
                    <input id="topic" name="topic" type="text" placeholder="หัวข้อกระทู้" value="<?php echo $topic;?>">
                    <p style="margin-top: 5px;font-family: IBM Plex Sans Thai, sans-serif;color: red"class="validateInput"><?php echo $errorTitle; ?></p>
                </div>
                <div class="contentContainer">
                    <p id="contentCount" class="countChar"></p>
                    <textarea name="content" id="content" placeholder="เนื้อหากระทู้"><?php echo $content; ?></textarea>
                    <p style="margin-top: 5px;font-family: IBM Plex Sans Thai, sans-serif; color: red" class="validateInput"><?php echo $errorContent; ?></p>
                    <input id="submitBtn" type="submit" value="สร้างกระทู้">
                </div>
            </form>


        </div>
        <div class="displayBlogContainer">
            <div class="displayTopic">
                <h1>กระทู้ของคุณ</h1>
            </div>

            <div class="displayContentContainer">
                <div class="getTopic">
                    <?php  echo $displayTopic?>
                </div>
                <div class="getContent">
                <?php  echo $displayContent?>
                </div>
            </div>
        </div>
    </section>

    <script>
    function updateCharCount(inputId, countId, maxLength, minLength) {
      
        const input = document.getElementById(inputId);
        const count = document.getElementById(countId);    
        const currentText = input.value.replace(/\s/g, '');   
        const currentLength = currentText.length;
        count.textContent = `${currentLength}/${maxLength}`;

        if (currentLength < minLength || currentLength > maxLength) {
            count.style.color = 'red';
        } else {
            count.style.color = ''; 
        }
    }
    document.getElementById('topic').addEventListener('input', function () {
        updateCharCount('topic', 'topicCount', 140, 4);
    });

    document.getElementById('content').addEventListener('input', function () {
        updateCharCount('content', 'contentCount', 2000, 6);
    });

    document.addEventListener('DOMContentLoaded', function () {
        updateCharCount('topic', 'topicCount', 140, 4);
        updateCharCount('content', 'contentCount', 2000, 6);
    });
</script>

</body>

</html>