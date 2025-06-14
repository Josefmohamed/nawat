//import blocks
import {headerBlock} from './headerBlock';
import {footerBlock} from './footerBlock';
import {hero_block} from './hero_block';
import {our_vision} from './our_vision';
import {image_and_text} from './image_and_text';
import {find_us} from './find_us';
import {contact_us_block} from './contact_us_block';
import {our_mission} from './our_mission';
import {about_us_block} from './about_us_block';

export function indexBlocks() {
  headerBlock();
  hero_block();
  footerBlock();
  our_vision();
  image_and_text();
  find_us();
  contact_us_block();
  our_mission();
  about_us_block()

}
