/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_strnstr.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/05 14:36:17 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/10 22:52:28 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_strnstr(const char *str, const char *tofind, size_t n)
{
	if (!(*tofind))
		return ((char *)str);
	if (!(*str) || !n)
		return ((char *)0);
	if (*str == *tofind)
	{
		if (ft_strnstr(str + 1, tofind + 1, n - 1) - 1 == str)
			return ((char *)str);
	}
	return (ft_strnstr(str + 1, tofind, n - 1));
}
