<?php

namespace app\interfaces;

interface IRender {
   public function renderVeiws($template, $params = []);
}