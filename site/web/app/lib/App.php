<?php

final class App {
  private function __construct() {}

  const POST_TYPE_GUIDE = 'ghid';
  const POST_TYPE_CAMPAIGN = 'campanie';
  const POST_TYPE_LINK = 'link_util';

  const HOMEPAGE_GUIDE_COUNT = 7;
  const HOMEPAGE_CAMPAIGNS_COUNT = 3;
  const LINK_COUNT = 7;

  const GUIDE_METABOX_GALLERY = 'fii_pregatit_galerie';
  const CAMPAIGN_METABOX_ATTACHMENTS = 'fii_pregatit_atasamente';
  const CAMPAIGN_METABOX_VIDEO_GROUP = 'fii_pregatit_video_list';

  const PAGE_PERSONAL_PLAN = 'plan-personal';
  const PAGE_FIRST_AID = 'prim-ajutor';
}
