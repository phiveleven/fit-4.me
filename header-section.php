<?
  global $email;
?><header>
  <a href="/" id=icon><?= $site_name ?></a>
  <span>
    <a class=facebook href="http://facebook.com/pages/Fit-4me/332825230062037" title="on Facebook" target=_blank>on Facebook</a>
    <a class=twitter href="http://twitter.com/cyndles" title="@cyndles" target=_blank>@cyndles</a>
    <a class=email href="mailto:<?= $email ?>" title="<?= $email ?>"><?= $email ?></a><br>
    <? bloginfo('description') ?>
  </span>
  <nav>
    <a href="/about">About <small>Cindy</small></a>
    <a href="/rates">Rates <small>Packages</small></a>
    <a href="/services">Services <small>Process</small></a>
    <a href="/contact">Contact <small>Get Started</small></a>
    <a href="/">Top</a>
  </nav>
</header>