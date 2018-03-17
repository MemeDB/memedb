<?php
require('api.php');

$account = $_GET['id'];

if ($account != null)
  $account = user::loadFromId($account);

if (loggedIn() && !$account) {
  $account = getUser();
}

if ($account == null)
  header("Location: https://meme-db.com");
?>

<!DOCTYPE html>
<html>

<head>
  <?php imports(); ?>
  <link rel="icon" href="https://i.imgur.com/h0t0THj.png" type="image" sizes="16x16">
  <title>memedb</title>
</head>

<body>

  <div class="top-bar">
    <div class="logo">memedb</div>
    <div class="searchbar">
      <i class="material-icons search-g" style="float: left; padding-right: 25px;position:relative; top: -4px;">search</i><input type="text" placeholder="Search" style="all: unset; width: 150px;position: relative; left: 11px;" />

      <div class="search-result-box" style="display:none;">
        <div class="search-op">
          <p class="res-p">This is option 1</p>
        </div>
        <div class="search-op">
          <p class="res-p">This is option 2</p>
        </div>
        <div class="search-op">
          <p class="res-p">This is option 3</p>
        </div>
        <div class="search-op">
          <p class="res-p">This is option 1</p>
        </div>
        <div class="search-op">
          <p class="res-p">This is option 2</p>
        </div>
        <div class="search-op">
          <p class="res-p">This is option 3</p>
        </div>
      </div>

      <div class="search-featured-box" style="display:none;">
        <h1>Featured Users</h1>
        <div class="s-box-holder">
          <div class="s-box">

          </div>
          <div class="s-box">

          </div>
          <div class="s-box">

          </div>
          <div class="s-box">

          </div>
          <div class="s-box">

          </div>
          <div class="s-box">

          </div>
          <div class="s-box">

          </div>
          <div class="s-box">

          </div>
          <div class="s-box">

          </div>
        </div>
      </div>

    </div>
    <div class="sign-in">SIGN IN</div>
  </div>

  <div class="imp-bg-fade" id="imp-bg-fade" style="display: none; opacity 0;"></div>

  <div class="l-sett-opt" style="display: none;">
    <button class="l-sett-button">Rename</button>
    <button class="l-sett-button">Info</button>
    <button class="l-sett-button">Settings</button>

    <div class="l-line"></div>

    <button class="l-sett-button" style="color: #f44242;">Delete</button>

  </div>

  <div class="imp-message" id="imp-message" style="display: none; opacity: 0;">
    <div class="imp-title-holder">
      <h1 class="imp-title">Warning!</h1>
    </div>
    <p class="imp-p">Are you sure you want to permanently delete this library and all of its content?</p>
    <button class="imp-op-2" style="color: #f44242;">Delete</button>
    <button class="imp-op-1">Cancel</button>
  </div>

  <div class="edit-menu">
    <div class="e-add" title="Add Library">
      <i class="material-icons edit-icons">add</i>
    </div>
    <div class="e-edit" title="Edit Library">
      <i class="material-icons edit-icons">edit</i>
    </div>
    <div class="e-fs" title="Share Library">
      <i class="material-icons edit-icons">folder_shared</i>
    </div>
    <div class="l-line"></div>
    <div class="e-sort" title="Sort by">
      <i class="material-icons edit-icons">sort</i>
    </div>
    <div class="e-lock-lib" title="Lock Library">
      <i class="material-icons edit-icons">vpn_key</i>
    </div>
    <div class="e-timeln" title="Statistics">
      <i class="material-icons edit-icons">timeline</i>
    </div>
    <div class="e-share" title="Share">
      <i class="material-icons edit-icons">share</i>
    </div>
    <div class="l-line">
    </div>
    <div class="e-settings" title="Settings">
      <i class="material-icons edit-icons">settings</i>
    </div>
  </div>

  <div class="sidenav">
    <div class="s-user">
      <div class="a-user-info">
        <div class="image"></div>
        <div class="name">
          <h1 class="n-name"><?php echo $account->name; ?></h1>
        </div>
        <div class="username">@<?php echo $account->handle; ?></div>
        <div class="info">
          <!-- CHANGE NAME LATER -->
          <div class="u-stat karma">Karma
            <span style="font-family: Roboto;font-weight: lighter;color: #222;"><?php echo $account->karma; ?>
            </span>
          </div>
          <!--  -->
          <div class="u-stat rank">Elo
            <span style="font-family: Roboto;font-weight: lighter;color: #222;"><?php echo ($account->rank ? $account->rank : "NaN"); ?>
            </span>
          </div>
        </div>
        <button class="follow">Follow
          <span style="font-family: Roboto;font-weight: 500;color: #ccc;">0
          </span></button>
        <!-- <button class="follow" style="background:#ccc; color:#222;">Unfollow <span style="font-family: Roboto;font-weight: 500;color: #555;">0
        </span></button> -->
      </div>
    </div>

    <div class="s-favorites">
      <div class="fav-holder">
        <div class="div-line"></div>
        <h1 class="div-text">Favorites</h1>
        <div class="div-line"></div>
      </div>
      <div class="meme-type">
        <?php
        foreach ($account->favorites as $favorite) {
         ?>
        <div class="type"><?php echo $favorite; ?><button class="t-cross">X</button></div>
        <?php } ?>
        <button class="t-add">+</button>
      </div>
      <div class="line"></div>
    </div>


    <div class="sub-box">
      <div class="subscriptions">
        <div class="s-searchbar">
          <i class="material-icons seach-g" style="float: left;position:relative; top: -1px; color: #666;">search</i><input type="text" placeholder="Search User" style="all: unset; width: 88.5%;position: relative; left: 11px; border-bottom: 2px solid #ddd;"
          />
        </div>

        <div class="r-container">
          <div class="r-image-preview"></div>
          <div class="r-desc">
            <h1 class="r-title-text">Meme Title</h1>
            <div class="r-tags">
              <button class="r-type">SHITPOSTING</button>
            </div>
          </div>
        </div>

        <div class="r-container">
          <div class="r-image-preview"></div>
          <div class="r-desc">
            <h1 class="r-title-text">Meme Title</h1>
            <div class="r-tags">
              <button class="r-type">IRONIC</button>
            </div>
          </div>
        </div>

        <div class="r-container">
          <div class="r-image-preview"></div>
          <div class="r-desc">
            <h1 class="r-title-text">Meme Title</h1>
            <div class="r-tags">
              <button class="r-type">IRONIC</button>
            </div>
          </div>
        </div>


    <div class="s-results">
      <div class="s-r-scroll">

        <div class="h-post tiny">
          <div class="h-post-info tiny">
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -7.5px;">more_horiz</i>
            </div>
          </div>
        </div>

        <div class="h-post tiny">
          <div class="h-post-info tiny">
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -7.5px;">more_horiz</i>
            </div>
          </div>
        </div>

        <div class="h-post tiny">
          <div class="h-post-info tiny">
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -7.5px;">more_horiz</i>
            </div>
          </div>
        </div>

        <div class="h-post tiny">
          <div class="h-post-info tiny">
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -7.5px;">more_horiz</i>
            </div>
          </div>
        </div>

        <div class="h-post tiny">
          <div class="h-post-info tiny">
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -7.5px;">more_horiz</i>
            </div>
          </div>
        </div>

        <div class="h-post tiny">
          <div class="h-post-info tiny">
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -7.5px;">more_horiz</i>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <div class="content">
    <div class="c-box">
      <h1 style="margin-left: 10px;">Most Popular</h1>
      <div class="c-popular">
        <div class="h-post small">
          <div class="h-post-info">
            <div class="h-icon">
              <i class="material-icons" style="font-size: 18px; top: 5px;">keyboard_arrow_up</i>
            </div>
            <div class="h-p-stat" title="16472">
              16K
            </div>
            <div class="h-icon">
              <i class="material-icons black" style="font-size: 18px; top: 5px;font-weight: 600;">repeat</i>
            </div>
            <div class="h-p-stat">
              4K
            </div>
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -3px;">more_horiz</i>
            </div>
          </div>
        </div>
        <div class="h-post small">
          <div class="h-post-info">
            <div class="h-icon">
              <i class="material-icons" style="font-size: 18px; top: 5px;">keyboard_arrow_up</i>
            </div>
            <div class="h-p-stat">
              16K
            </div>
            <div class="h-icon">
              <i class="material-icons black" style="font-size: 18px; top: 5px;font-weight: 600;">repeat</i>
            </div>
            <div class="h-p-stat">
              4K
            </div>
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -3px;">more_horiz</i>
            </div>
          </div>
        </div>
        <div class="h-post small">
          <div class="h-post-info">
            <div class="h-icon">
              <i class="material-icons" style="font-size: 18px; top: 5px;">keyboard_arrow_up</i>
            </div>
            <div class="h-p-stat">
              16K
            </div>
            <div class="h-icon">
              <i class="material-icons black" style="font-size: 18px; top: 5px;font-weight: 600;">repeat</i>
            </div>
            <div class="h-p-stat">
              4K
            </div>
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -3px;">more_horiz</i>
            </div>
          </div>
        </div>
        <div class="h-post small">
          <div class="h-post-info">
            <div class="h-icon">
              <i class="material-icons" style="font-size: 18px; top: 5px;">keyboard_arrow_up</i>
            </div>
            <div class="h-p-stat">
              16K
            </div>
            <div class="h-icon">
              <i class="material-icons black" style="font-size: 18px; top: 5px;font-weight: 600;">repeat</i>
            </div>
            <div class="h-p-stat">
              4K
            </div>
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -3px;">more_horiz</i>
            </div>
          </div>
        </div>
        <div class="h-post small">
          <div class="h-post-info">
            <div class="h-icon">
              <i class="material-icons" style="font-size: 18px; top: 5px;">keyboard_arrow_up</i>
            </div>
            <div class="h-p-stat">
              16K
            </div>
            <div class="h-icon">
              <i class="material-icons black" style="font-size: 18px; top: 5px;font-weight: 600;">repeat</i>
            </div>
            <div class="h-p-stat">
              4K
            </div>
            <div class="h-more">
              <i class="material-icons" style="font-size: 18px; top: -3px;">more_horiz</i>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="library l-l1">
      <i class="material-icons l-icon">photo_library</i>
      <h1 class="l-title">Posts</h1>

      <div class="l-settings">
        <i class="material-icons">keyboard_arrow_down</i>
      </div>
      <div class="l-drop">
        <i class="material-icons">more_horiz</i>
      </div>
    </div>
    <div class="l-content" style="height: 0px;">
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
    </div>

    <div class="library l-l1">
      <i class="material-icons l-icon">repeat</i>
      <h1 class="l-title">Reposts</h1>
      <div class="l-settings">
        <i class="material-icons">keyboard_arrow_down</i>
      </div>
      <div class="l-drop">
        <i class="material-icons">more_horiz</i>
      </div>
    </div>
    <div class="l-content" style="height: 0px;">
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
    </div>

    <div class="library l-l1">
      <i class="material-icons l-icon">star</i>
      <h1 class="l-title">Favorites</h1>

      <div class="l-settings">
        <i class="material-icons">keyboard_arrow_down</i>
      </div>
      <div class="l-drop">
        <i class="material-icons">more_horiz</i>
      </div>
    </div>
    <div class="l-content" style="height: 0px;">
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
    </div>


    <div class="library">
      <h1 class="l-title">Library</h1>

      <div class="l-settings">
        <i class="material-icons">keyboard_arrow_down</i>
      </div>
      <div class="l-drop">
        <i class="material-icons">more_horiz</i>
      </div>
    </div>
    <div class="l-content" style="height: 0px;">
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
    </div>

    <div class="library">
      <h1 class="l-title">Library</h1>

      <div class="l-settings">
        <i class="material-icons">keyboard_arrow_down</i>
      </div>
      <div class="l-drop">
        <i class="material-icons">more_horiz</i>
      </div>
    </div>
    <div class="l-content" style="height: 0px;">
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
    </div>

    <div class="library l-selected">
      <h1 class="l-title">Selected Library</h1>

      <div class="l-settings">
        <i class="material-icons">keyboard_arrow_down</i>
      </div>
      <div class="l-drop">
        <i class="material-icons">more_horiz</i>
      </div>
    </div>
    <div class="l-content" style="height: 0px;">
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
    </div>

    <div class="library">
      <h1 class="l-title">Library</h1>

      <div class="l-settings">
        <i class="material-icons">keyboard_arrow_down</i>
      </div>
      <div class="l-drop">
        <i class="material-icons">more_horiz</i>
      </div>
    </div>
    <div class="l-content" style="height: 0px;">
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
    </div>

    <div class="library">
      <h1 class="l-title">Library</h1>

      <div class="l-settings">
        <i class="material-icons">keyboard_arrow_down</i>
      </div>
      <div class="l-drop">
        <i class="material-icons">more_horiz</i>
      </div>
    </div>
    <div class="l-content" style="height: 0px;">
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
      <div class="l-img"></div>
    </div>
  </div>



</body>

</html>
