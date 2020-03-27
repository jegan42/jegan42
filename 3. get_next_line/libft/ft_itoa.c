/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_itoa.c                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <marvin@42.fr>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/04 11:00:22 by jeagan            #+#    #+#             */
/*   Updated: 2019/04/04 11:00:26 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

char	*ft_itoa(int n)
{
	char	*s;

	if (n == -2147483648)
		return (ft_strdup("-2147483648"));
	if (!(s = (char*)malloc(sizeof(char) * 2)))
		return ((char *)0);
	if (n < 0)
	{
		s[0] = '-';
		s[1] = '\0';
		s = ft_strjoin(s, ft_itoa(-n));
	}
	else if (n < 10)
	{
		s[0] = n + '0';
		s[1] = '\0';
	}
	else
		s = ft_strjoin(ft_itoa(n / 10), ft_itoa(n % 10));
	return (s);
}
