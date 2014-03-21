<?php

namespace Anna\Tracks;

interface TracksInterface {

	public function addTrack($fieldName);

	public function removeTrack($fileName);

}