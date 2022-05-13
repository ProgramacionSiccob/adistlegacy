import React from 'react';
import { Container } from '@mui/material';
import PropTypes from 'prop-types';
import { useSelector } from 'react-redux';
import { RequestLoading } from '../../ui/06_atoms/loadings/RequestLoading';

/**
 * @component
 * @category Components / Common
 * @subcategory page
 * @name ContainerPage
 * @description  ContainerPage is a wrapper for the Container component.
 * @returns {React.Component} A react component
 */
export function ContainerPage({ children, ...others }) {
  const { loading } = useSelector((state) => state.ui);
  return (
    <Container className="animate__animated animate__fadeIn" {...others}>
      {children}
      <RequestLoading open={loading} />
    </Container>
  );
}

ContainerPage.propTypes = {
  /**
   * The children of the component.
   */
  children: PropTypes.node.isRequired
};
