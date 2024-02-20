INSERT INTO `cars` (`car_id`, `price`, `make`, `model`, `year`, `kilometers`, `fueltype`, `bodytype`, `color`, `transmission`, `doors`, `comments`, `image1`, `image2`, `image3`, `image4`) VALUES
(1, 24999, 'bmw', 'z4', 2014, 92415, 'petrol', 'convertible', 'white', 'manual', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel venenatis dui, in porttitor dolor. Sed risus tortor, sagittis eget viverra et, placerat nec leo. Nulla facilisi. Nunc volutpat lectus leo, vitae accumsan mi tincidunt et. Ut blandit eu erat a lacinia. Nam elementum aliquet facilisis. Praesent sed varius nisl.'),
(2, 3490, 'opel', 'meriva', 2005, 178644 'diesel', 'hatchback', 'gray', 'manual', '5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed metus dui, ornare vel elit et, vulputate aliquet leo. Nullam tempor nunc non turpis cursus, eget varius nunc tincidunt. Nulla vehicula, arcu at imperdiet ullamcorper, leo eros tincidunt turpis, non efficitur nisi nisl non mi. Quisque sit amet dictum dolor. Donec.'),
(3, 38990, 'lexus', 'rx', 2016, 58987, 'hybrid', 'suv', 'blue', 'automatic', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut pulvinar nisl a ligula vulputate, ac hendrerit diam fringilla. Sed purus ligula, egestas porta accumsan congue, aliquam at massa. Phasellus sem est, volutpat in enim sed, consequat feugiat mi. Donec orci odio, finibus in maximus vitae, consectetur vitae urna. Integer quis. '),
(4, 55500, 'porsche', 'macan', 2014, 51250, 'petrol', 'suv', 'gray', 'automatic', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam maximus, metus eget molestie bibendum, urna metus fermentum nulla, sit amet blandit metus massa at velit. Vivamus sed massa euismod, rutrum orci laoreet, rutrum velit. Nam rutrum vehicula odio, quis consequat arcu mattis vel. Etiam sem quam, tristique mollis lacus id. ');

INSERT INTO `contact` (`contac_id`, `firstname`, `lastname`, `email`, `phone`, `subject`, `message`, `acknowledged`) VALUES
(3, 'Rapora', 'Kaal', 'raporak@gmail.com', '0852695405', 'Problem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vitae nisi et ex sagittis consequat vitae vitae eros. Duis condimentum pharetra lobortis. Morbi non efficitur purus. Aliquam venenatis nisl ac. ', NULL);

INSERT INTO `review` (`review_id`, `name`, `rating`, `comment`, `approved`) VALUES
(1, 'Jane Caran', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet ornare orci, sed mattis tellus. Aliquam hendrerit dignissim tellus, nec auctor magna feugiat ac.', '1'),
(2, 'Bob Urgando', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan mollis commodo. Phasellus sed mi elit. Phasellus varius arcu mauris, et sagittis velit egestas id. ', '1'),
(3, 'Paula', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed vulputate nibh, eget semper augue. Donec sit amet diam quis ipsum varius lacinia. Sed in.', '1'),
(4, 'Chewie', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras iaculis augue in sem posuere dignissim. Nulla non elementum erat, eleifend rhoncus tellus. Aliquam lobortis erat.', '0'),
(5, 'Charles', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis accumsan suscipit. Vestibulum nunc risus, aliquam vitae egestas sit amet, pulvinar a ligula. Duis mattis.', '1'),
(6, 'Tryna Hardy', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque non magna cursus, posuere risus id, facilisis sapien. Aenean et venenatis nisl. Quisque tempus iaculis mattis.', '1'),
(7, 'Bob', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam. ', '0');

INSERT INTO `services` (`service_id`, `title`, `description`) VALUES
(1, 'Buy Second-Hand Cars', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(2, 'Regular Maintenance', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce blandit ex sit amet mauris finibus, non ornare tortor ornare. Lorem. '),
(3, 'Mechanical Repairs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam quis ultrices nisl, nec tempus ligula. Ut porttitor justo id mollis. '),
(4, 'Body Work', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vulputate mauris ut varius porttitor. Maecenas vehicula risus et quam cursus.');

INSERT INTO `users` (`user_id`, `name`, `password`, `user_type`, `username`) VALUES
(1, 'Vincent', '1234', 'admin', 'vparrot'),
(2, 'John', 'abcd', 'user', 'jcrystal'),
(3, 'Kathy', 'abcd', 'user', 'ktrista');