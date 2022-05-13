import React from 'react';
import { Link, Typography } from '@mui/material';
import PropTypes from 'prop-types';

export default function Copyright(props) {
  const { name, url } = props;
  return (
    <Typography align="center" variant="caption" color="textSecondary" {...props}>
      {'© '}
      <Link color="inherit" href={url} target="_blank">
        {name}
      </Link>{' '}
      {'All Rights Reserved '}
      {new Date().getFullYear()}.
    </Typography>
  );
}

Copyright.propTypes = {
  url: PropTypes.string.isRequired,
  name: PropTypes.string.isRequired
};
