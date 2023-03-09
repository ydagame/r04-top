/**
 * イベント
 */
$(function()
{
  /**
   * Project Name Input Change Event
   */
  $('#project_name').on('input', function()
  {
    form_submit_check();
  });

  /**
   * URL Input Change Event
   */
  $('#url').on('input', function()
  {
    form_submit_check();
  });

  /**
   * Banner Img Change Event
   */
  $('#banner_img').on('change', function(e)
  {
    let fileReader = new FileReader();

    fileReader.addEventListener('load', function(e)
    {
      $('.banner-img').css('background', `url(${e.target.result})`);
    });

    fileReader.readAsDataURL(e.target.files[0]);
  });

  /**
   * プラットフォームチェックボックス
   */
  for (let checkbox of document.querySelectorAll('.platforms input[type="checkbox"]'))
  {
    checkbox.addEventListener('change', function()
    {
      $(`.platform-icons > i.${checkbox.name}`).css('display', checkbox.checked ? 'flex' : 'none');
    });
  }

  form_submit_check();
});

/**
 * 有効なURLかどうか
 * @param { string } url 
 * @returns 有効
 */
function is_valid_URL(url)
{
  if (!url.includes('http')) return false;
  if (!url.includes('://'))  return false;
  if (!url.includes('.'))    return false;
  if ( url.includes('^'))    return false;
  
  for (let dotSpeStr of url.split('.'))
  {
    if (dotSpeStr == '') return false;
  }

  return true;
}

/**
 * プロジェクト名チェック
 */
function project_name_check()
{
  const project_name = $('#project_name').val();

  if (!project_name.includes('プロジェクト名') &&
       project_name.replaceAll(' ', '') != '' &&
       project_name.replaceAll('　', '') != '' &&
      !project_name.includes('^'))
  {
    // Check OK
    
    $('.error.error-1').text('　');

    $('.project-name').text(project_name);

    return true;
  }
  else
  {
    // Check Failed
    
    $('.error.error-1').text('有効なプロジェクト名を入力してください');

    return false;
  }
}

/**
 * URLチェック
 */
function url_check()
{
  const link = $('#url').val();

  if (is_valid_URL(link))
  {
    // Check OK

    $('span.error-2').text('　');
    
    $('.site-url').find('span').text(link);
    $('.site-url').css('color', 'darkslateblue');

    $('a.banner-wrapper').attr('href', link);

    return true;
  }
  else
  {
    // Check Failed

    $('span.error-2').text('有効なURLを入力してください');
    
    $('.site-url').find('span').text('URL未登録');
    $('.site-url').css('color', 'red');

    return false;
  }
}

/**
 * フォーム送信可能かどうかチェック
 */
function form_submit_check()
{
  const check1 = project_name_check();
  const check2 = url_check();

  set_enable_form_submit(check1 && check2);
}

/**
 * フォームの送信を有効にするかどうか
 * @param { boolean } enable 
 */
function set_enable_form_submit(enable)
{
  $('input.submit').prop('disabled', !enable);
}
