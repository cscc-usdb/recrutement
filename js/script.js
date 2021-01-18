$(document).ready(function() {
var $star_rating1 = $('.star-rating1 .fa');

var SetRatingStar1 = function() {
  return $star_rating1.each(function() {
    if (parseInt($star_rating1.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating1.on('click', function() {
  $star_rating1.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar1();
});

SetRatingStar1();
var $star_rating2 = $('.star-rating2 .fa');

var SetRatingStar2 = function() {
  return $star_rating2.each(function() {
    if (parseInt($star_rating2.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating2.on('click', function() {
  $star_rating2.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar2();
});

SetRatingStar2();
var $star_rating3 = $('.star-rating3 .fa');

var SetRatingStar3 = function() {
  return $star_rating3.each(function() {
    if (parseInt($star_rating3.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating3.on('click', function() {
  $star_rating3.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar3();
});

SetRatingStar3();
var $star_rating4 = $('.star-rating4 .fa');

var SetRatingStar4 = function() {
  return $star_rating4.each(function() {
    if (parseInt($star_rating4.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating4.on('click', function() {
  $star_rating4.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar4();
});

SetRatingStar4();
});